<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditProfile extends Component
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

    public function mount(){
        $currentUser = auth()->user();
        $customer = $currentUser->customer ?? null;

        $this->form = [
            'first_name' => $customer->first_name ?? '',
            'last_name' => $customer->last_name ?? '',
            'email' => $currentUser->email,
            'phone' => $customer->phone ?? '',
            'company' => $customer->company ?? '',
            'vat' => $customer->vat ?? '',
            'fiscal_code' => $customer->fiscal_code ?? '',
            'sdi' => $customer->sdi ?? '',
            'billing_address' => $customer->billing_address ?? '',
            'billing_city' => $customer->billing_city ?? '',
            'billing_state' => $customer->billing_state ?? '',
            'billing_zip' => $customer->billing_zip ?? '',
            'billing_country' => $customer->billing_country ?? '',
            'shipping_address' => $customer->shipping_address ?? '',
            'shipping_city' => $customer->shipping_city ?? '',
            'shipping_state' => $customer->shipping_state ?? '',
            'shipping_zip' => $customer->shipping_zip ?? '',
            'shipping_country' => $customer->shipping_country ?? '',
        ];
    }

    protected function rules(){
        return [
            'form.first_name' => 'required|string|max:255',
            'form.last_name' => 'required|string|max:255',
            'form.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id()),
            ],
            'form.phone' => 'required|string|max:20',
            'form.password' => 'nullable|string',
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
    }

    public function render()
    {
        return view('livewire.pages.editProfile');
    }

    public function handleEditProfile(){
        $this->validate();

        $currentUser = Auth::user();
        $currentUser->update([
            'name' => $this->form['first_name'] . ' ' . $this->form['last_name'],
            'email' => $this->form['email'],
        ]);

        if (!empty($this->form['password'])) {
            $currentUser->update([
                'password' => Hash::make($this->form['password']),
            ]);
        }

        $currentUser->customer()->update([
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

        redirect('order-list')->with('success', 'Modifiche effettuate con successo!');
    }
}
