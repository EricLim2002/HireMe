<?php

namespace App\Livewire;

use Livewire\Component;

class TopButton extends Component
{
    public $showButton = false;
    
    public function render()
    {
        return view('livewire.top-button');
    }
}
