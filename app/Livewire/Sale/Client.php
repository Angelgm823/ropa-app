<?php

namespace App\Livewire\Sale;

use App\Models\Client as Cliente;
use Livewire\Attributes\On;
use Livewire\Component;

class Client extends Component
{
    public $Id=0;
    public $client;
    public $nameClient;

    //Propiedades del modelo
    public $nombre;
    public $identificacion;
    public $telefono;
    public $correo;
    public $empresa;
     public $nit;

    public function render()
    {
        return view('livewire.sale.client', [
            "clients"=>Cliente::all()
    ]);
    }

    #[On('client_id')]
    public function client_id($id=1){
        $this->client=$id;
        $this->nameClient($id);
    }

    public function mount(){
        $this->nameClient();
    }

    public function nameClient($id=1){
        $findClient = Cliente::find($id);
        $this->nameClient = $findClient->nombre;
    }

    public function store(){
        //dump('crear categoria');
        $rules =[
            'nombre' => 'required|min:5|max:255',
            'identificacion'=> 'required|max:15|unique:clients',
            'correo'=> 'max:255|email|nullable',
        ];

        $this->validate($rules);

        $client = new Cliente();
        $client->nombre = $this->nombre;
        $client->identificacion = $this->identificacion;
        $client->telefono = $this->telefono;
        $client->correo = $this->correo;
        $client->empresa = $this->empresa;
        $client->nit = $this->nit;

        $client->save();

        $this->dispatch('close-modal', 'modalClient');
        $this->dispatch('msg', 'Cliente creado correctamente');

        $this->clean();
    }
    public function clean()
    {

        $this->reset(
            'nombre',
            'identificacion',
            'correo',
            'telefono',
            'empresa',
            'nit'
        );
        $this->resetErrorBag();
    }

    public function openModal(){
        $this->dispatch('open-modal', 'modalClient');
    }
}
