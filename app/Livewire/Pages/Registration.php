<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Registration extends Component
{

    public $form = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'password' => '',
        'company' => '',
        'vat' => '',
        'fiscal_code' => '',
        'sdi' => '',
        'billing_address' => '',
        'billing_city' => '',
        'billing_state' => '',
        'billing_zip' => '',
        'billing_country' => '',
        'shipping_address' => '',
        'shipping_city' => '',
        'shipping_state' => '',
        'shipping_zip' => '',
        'shipping_country' => '',
    ];

    protected $rules = [
        'form.first_name' => 'required|string|max:255',
        'form.last_name' => 'required|string|max:255',
        'form.email' => 'required|email|max:255|unique:users,email',
        'form.phone' => 'required|string|max:20',
        'form.password' => 'required|string',
        'form.company' => 'nullable|string|max:255',
        'form.vat' => 'nullable|string|max:13',
        'form.fiscal_code' => 'nullable|string|max:20',
        'form.sdi' => 'nullable|string|max:20',
        'form.billing_address' => 'required|string|max:255',
        'form.billing_city' => 'required|string|max:255',
        'form.billing_state' => 'required|string|max:2',
        'form.billing_zip' => 'required|string|max:5',
        'form.billing_country' => 'required|string|max:255',
        'form.shipping_address' => 'required|string|max:255',
        'form.shipping_city' => 'required|string|max:255',
        'form.shipping_state' => 'required|string|max:2',
        'form.shipping_zip' => 'required|string|max:5',
        'form.shipping_country' => 'required|string|max:255',
    ];

    public function render()
    {
        return view('livewire.pages.registration');
    }

    public function register(){
        $this->validate();

        $user = User::create([
            'name' => $this->form['first_name'] . ' ' . $this->form['last_name'],
            'email' => $this->form['email'],
            'password' => Hash::make($this->form['password']),
            'role' => 'customer',
            'remember_token' => Str::random(60),
            'email_verified_at' => now(),
        ]);

        if($user){
            $user->customer()->create([
                'first_name' => $this->form['first_name'],
                'last_name' => $this->form['last_name'],
                'phone' => $this->form['phone'],
                'company' => $this->form['company'],
                'vat' => $this->form['vat'],
                'fiscal_code' => $this->form['fiscal_code'],
                'sdi' => $this->form['sdi'],
                'billing_address' => $this->form['billing_address'],
                'billing_city' => $this->form['billing_city'],
                'billing_state' => $this->form['billing_state'],
                'billing_zip' => $this->form['billing_zip'],
                'billing_country' => $this->form['billing_country'],
                'shipping_address' => $this->form['shipping_address'],
                'shipping_city' => $this->form['shipping_city'],
                'shipping_state' => $this->form['shipping_state'],
                'shipping_zip' => $this->form['shipping_zip'],
                'shipping_country' => $this->form['shipping_country'],
            ]);

            Auth::login($user, true);
            redirect(config('fortify.home'))->with('success', 'Registrazione effettuata con successo!');
        }
    }
}

