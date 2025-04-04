<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = \App\Models\Product::all();
        return view('livewire.pages.products', [
            'products' => $products,
        ]);
    }
}
