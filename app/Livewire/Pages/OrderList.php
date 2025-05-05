<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderList extends Component
{
    public function render()
    {
        $user = Auth::user();
        $customer = $user->customer ?? null;
        $orders = collect();

        if ($customer && $customer->orders) {
            $orders = $customer->orders->collect()->sortByDesc('created_at');
        }

        $orders = compact('orders');
        return view('livewire.pages.orderlist', $orders);
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('success', 'Logout effettuato con successo!');
    }
}
