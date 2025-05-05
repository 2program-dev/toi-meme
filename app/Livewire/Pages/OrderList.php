<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderList extends Component
{
    public function render()
    {
        $customer = Auth::user()->customer;
        if ($customer && $customer->orders) {
            $orders = $customer->orders->collect()->sortByDesc('created_at');
        } else {
            $orders = collect();
        }
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
