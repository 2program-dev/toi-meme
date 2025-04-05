<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderList extends Component
{
    public function render()
    {
        $orders = Auth::user()->customer->orders;
        return view('livewire.pages.orderlist', compact('orders'));
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('success', 'Logout effettuato con successo!');
    }
}
