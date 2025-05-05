<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderList extends Component
{
    public function render()
    {
        $customer = Auth::user()->customer;
        $orders = $customer->orders->collect();
        $orders = $orders->sortByDesc('created_at');
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
