<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Collection;

class Cart extends Component
{
    protected $listeners = ['removeFromCart'];
    public Collection $items;
    public string $total = '0,00';

    public function mount(\App\Services\Cart $cart)
    {
        $this->items = $cart->items();
        $this->total = $cart->formatted_total();
    }
    public function render()
    {
        return view('livewire.pages.cart');
    }

    public function removeFromCart(int $productId, \App\Services\Cart $cart)
    {
        $cart->remove($productId);
        $this->items = $cart->items();
        $this->total = $cart->formatted_total();
        session()->flash('success', 'Prodotto rimosso dal carrello');
    }

    public function increaseQuantity(int $productId, \App\Services\Cart $cart)
    {
        $cart->increase($productId);
        $this->items = $cart->items();
        $this->total = $cart->formatted_total();
    }

    public function decreaseQuantity(int $productId, \App\Services\Cart $cart){
        $cart->decrease($productId);
        $this->items = $cart->items();
        $this->total = $cart->formatted_total();
    }

    public function checkout(\App\Services\Cart $cart){
        if($this->items->isEmpty()){
            session()->flash('error', 'Il carrello è vuoto');
            return;
        }

        $order = $cart->checkout();
        if($order){
            redirect()->route('order-list')->with('success', "Ordine $order->order_number creato con successo");
        } else {
            redirect()->route('cart')->with('error', "Errore durante la creazione dell'ordine");
        }
    }

    public function toggleCustomization(int $productId, \App\Services\Cart $cart)
    {
        $cart->toggleCustomization($productId);
        $this->items = $cart->items();
        $this->total = $cart->formatted_total();
    }
}
