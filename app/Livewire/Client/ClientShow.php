<?php

namespace App\Livewire\Client;

use Livewire\Component;

class ClientShow extends Component
{
    public $client;
    public function render()
    {
        return view('livewire.client.client-show');
    }
}
