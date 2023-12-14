<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('¿Quienes somos?')]
class QuienesSomos extends Component
{
    public function render()
    {
        return view('livewire.quienes-somos');
    }
}
