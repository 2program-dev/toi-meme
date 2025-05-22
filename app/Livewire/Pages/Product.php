<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Product extends Component
{

    public $slug;
    public $product;
    public $quantity = 1;
    public $available = false;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = \App\Models\Product::where('slug', $slug)->firstOrFail();
        $this->quantity = $this->product->variants->first()->from_qty;
        $this->available = $this->product->available;
    }

    public function render()
    {
        return view('livewire.pages.product');
    }

    public function addToCart(\App\Services\Cart $cart){
        $cart->add($this->product->id, $this->quantity);

        session()->flash('success', 'Prodotto aggiunto al carrello');
        return redirect()->route('cart');
    }
}
