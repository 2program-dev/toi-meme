<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $products = \App\Models\Product::all();
        return view('livewire.pages.home', [
            'products' => $products,
        ]);
    }
}
