<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainMenu extends Component{

    public string $menuClass = '';
    public function render()
    {
        return view('livewire.components.main-menu');
    }

}
