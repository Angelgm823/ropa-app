<?php

namespace App\Livewire;

use App\Models\Contacto;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contactanos')]
class Contactar extends Component
{
    public $correo;
    public $nombre;
    public $telefono;
    public $mensaje;
    public function render()
    {
        return view('livewire.contactar');
    }

    public function enviar()
    {
        $this->validate([
            'correo' => ['required', 'email'],
            'nombre' => ['required', 'min:3'],
            'telefono' => ['required', 'min:10'],
            'mensaje' => ['required']
        ]);

        Contacto::create([
            'correo'=>$this->correo,
            'nombre'=>$this->nombre,
            'telefono'=>$this->telefono,
            'mensaje'=>$this->mensaje
        ]);

        $this->reset('nombre', 'correo', 'telefono', 'mensaje');
        $this->dispatch('msg', 'Mensaje registrado correctamente');
    }
}
