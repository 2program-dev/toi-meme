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
}
