<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactsV2 extends Component
{

    public string $first_name = '';
    public string $last_name = '';
    public string $company = '';
    public string $phone = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    public function render()
    {
        return view('livewire.pages.contactsV2');
    }

    public function sendEmail()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string',
            'email' => 'required|email',
            'subject' => 'string|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw($this->buildPlainMessage(), function ($message) {
            $message->to(config('toimeme.contact_email'))
                ->subject($this->subject);
        });

        redirect()->route('contacts')->with('success', 'Email inviata con successo!');
    }

    protected function buildPlainMessage(): string
    {
        return <<<TEXT
            Richiesta da {$this->first_name} {$this->last_name}
            Email: {$this->email}
            Telefono: {$this->phone}
            Azienda: {$this->subject}

            Messaggio:
            {$this->message}
        TEXT;
    }
}
