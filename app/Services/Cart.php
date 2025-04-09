<?php

namespace App\Services;

use App\Enum\OrderStatus;
use App\Models\Order;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;
use App\Models\Product;

#[Middleware(['verified', 'role:customer'])]
class Cart
{
    const CART_KEY = 'shopping_cart';
    protected $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function getContent(): Collection
    {
        return collect($this->session->get(self::CART_KEY, []));
    }

    public function add(int $productId, int $quantity = 1): void
    {
        $cart = $this->getContent();
        $product = Product::find($productId);

        // Controlla se il prodotto è già nel carrello
        if ($cart->has($productId)) {
            // Aggiorna la quantità
            $this->update($productId, $cart->get($productId)['quantity'] + $quantity);
            return;
        }

        // Aggiungi il nuovo prodotto al carrello
        if($quantity >= $product->variants->first()->from_qty){
            $cart->put($productId, [
                'id' => $productId,
                'quantity' => $quantity,
                'customization' => false,
            ]);
        }


        $this->session->put(self::CART_KEY, $cart);
    }

    public function toggleCustomization(int $productId): void
    {
        $cart = $this->getContent();

        if ($cart->has($productId)) {
            $cartItem = $cart->get($productId);
            $cartItem['customization'] = !$cartItem['customization'];
            $cart->put($productId, $cartItem);
            $this->session->put(self::CART_KEY, $cart);
        }
    }

    public function update(int $productId, int $quantity): void
    {
        $cart = $this->getContent();

        if (!$cart->has($productId)) {
            return;
        }

        $cartItem = $cart->get($productId);
        $product = Product::find($productId);

        if($quantity >= $product->variants->first()->from_qty){
            $cartItem['quantity'] = $quantity;
            $cart->put($productId, $cartItem);
            $this->session->put(self::CART_KEY, $cart);
        }
    }

    public function increase(int $productId): void
    {
        $cart = $this->getContent();

        if ($cart->has($productId)) {
            $cartItem = $cart->get($productId);
            $cartItem['quantity']++;
            $cart->put($productId, $cartItem);
            $this->session->put(self::CART_KEY, $cart);
        }
    }

    public function decrease(int $productId): void
    {
        $cart = $this->getContent();

        if ($cart->has($productId)) {
            $cartItem = $cart->get($productId);
            $product = Product::find($productId);

            if(($cartItem['quantity']-1) >= $product->variants->first()->from_qty){
                if ($cartItem['quantity'] > 1) {
                    $cartItem['quantity']--;
                    $cart->put($productId, $cartItem);
                    $this->session->put(self::CART_KEY, $cart);
                }
            } else {
                //$this->remove($productId);
            }

        }
    }

    public function remove(int $productId): void
    {
        $cart = $this->getContent();

        if ($cart->has($productId)) {
            $cart->forget($productId);
            $this->session->put(self::CART_KEY, $cart);
        }
    }

    public function clear(): void
    {
        $this->session->forget(self::CART_KEY);
    }

    public function items(): Collection
    {
        $cart = $this->getContent();

        if ($cart->isEmpty()) {
            return collect([]);
        }

        $productIds = $cart->keys()->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        return $cart->map(function ($item) use ($products) {
            $product = $products->get($item['id']);
            $unitPriceBasedQuantity = $product->unitPriceBasedQuantity($item['quantity']) ?? $product->price;
            $subtotal = ($unitPriceBasedQuantity ?? 0) * $item['quantity'];
            if ($item['customization']) {
                $subtotal += env('CUSTOMIZATION_PRICE') * $item['quantity'];
            }
            return (object)[
                'id' => $item['id'],
                'quantity' => $item['quantity'],
                'customization' => $item['customization'],
                'product' => $product,
                'price' => $unitPriceBasedQuantity ?? 0,
                'price_formatted' => number_format($unitPriceBasedQuantity ?? 0, 2, ',', '.'),
                'subtotal' => $subtotal,
                'subtotal_formatted' => number_format($subtotal, 2, ',', '.'),
            ];
        });
    }

    public function total(): float
    {
        return $this->items()->sum('subtotal');
    }

    public function formatted_total(): string
    {
        return number_format($this->total(), 2, ',', '.');
    }

    public function has(int $productId): bool
    {
        return $this->getContent()->has($productId);
    }

    public function checkout(){
        $cartItems = $this->items();
        if ($cartItems->isEmpty()) {
            return false;
        }

        $user = auth()->user();
        if (!$user) {
            return false;
        }
        $customer = $user->customer;
        if (!$customer) {
            return false;
        }

        $order = Order::create([
            'customer_id' => $customer->id,
            'order_number' => Order::getNextInvoiceNumber(),
            'status' => OrderStatus::ORDER_RECEIVED,
            'subtotal' => $this->total(),
            'total' => $this->total(),
            'customer_first_name' => $customer->first_name,
            'customer_last_name' => $customer->last_name,
            'customer_phone' => $customer->phone,
            'customer_company' => $customer->company,
            'customer_vat' => $customer->vat,
            'customer_fiscal_code' => $customer->fiscal_code,
            'customer_sdi' => $customer->sdi,
            'customer_billing_address' => $customer->billing_address,
            'customer_billing_zip' => $customer->billing_zip,
            'customer_billing_city' => $customer->billing_city,
            'customer_billing_state' => $customer->billing_state,
            'customer_billing_country' => $customer->billing_country,
            'customer_shipping_address' => $customer->shipping_address,
            'customer_shipping_zip' => $customer->shipping_zip,
            'customer_shipping_city' => $customer->shipping_city,
            'customer_shipping_state' => $customer->shipping_state,
            'customer_shipping_country' => $customer->shipping_country,
        ]);

        if(!$order) return false;

        foreach ($cartItems as $item) {
            $order->orderRows()->create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_title' => $item->product->title,
                'quantity' => $item->quantity,
                'customization' => $item->customization,
                'price' => $item->price,
                'total' => $item->subtotal,
            ]);
        }

        $this->clear();
        return $order;
    }
}
