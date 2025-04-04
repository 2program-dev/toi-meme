<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function render()
    {
        return view('livewire.pages.login');
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Indirizzo email non valido',
            'password.required' => 'Password non valida',
        ];
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
            redirect(config('fortify.home'))->with('success', 'Login effettuato con successo!');
        }
        else {
            $this->addError('general', 'Attenzione! Email o password non validi!');
        }
    }
}
