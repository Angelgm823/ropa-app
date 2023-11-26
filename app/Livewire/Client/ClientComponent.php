<?php

namespace App\Livewire\Client;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Clientes')]
class ClientComponent extends Component
{
    public function render()
    {
        return view('livewire.client.client-component');
    }
}
