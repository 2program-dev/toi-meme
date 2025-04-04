<?php

namespace App\Services;

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
            ]);
        }


        $this->session->put(self::CART_KEY, $cart);
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
                $this->remove($productId);
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
            return (object)[
                'id' => $item['id'],
                'quantity' => $item['quantity'],
                'product' => $product,
                'price' => $unitPriceBasedQuantity ?? 0,
                'price_formatted' => number_format($unitPriceBasedQuantity ?? 0, 2, ',', '.'),
                'subtotal' => ($unitPriceBasedQuantity ?? 0) * $item['quantity'],
                'subtotal_formatted' => number_format(($unitPriceBasedQuantity ?? 0) * $item['quantity'], 2, ',', '.'),
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
}
