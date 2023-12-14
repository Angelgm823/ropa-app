<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ubicación')]

class LocationComponent extends Component
{

    public function render()
    {

        return view('livewire.location-component');
    }
}
