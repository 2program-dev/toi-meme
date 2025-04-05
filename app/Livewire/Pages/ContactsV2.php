<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class ContactsV2 extends Component
{
    public function render()
    {
        return view('livewire.pages.contactsV2');
    }

    public function sendEmail()
    {
        // TODO logica per inviare email
        redirect()->route('contacts')->with('success', 'Email inviata con successo!');
    }
}
