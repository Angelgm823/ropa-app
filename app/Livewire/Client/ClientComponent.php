<?php

namespace App\Livewire\Client;


use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

#[Title('Clientes')]
class ClientComponent extends Component
{

    use WithPagination;
    //propiedades de clase
    public $search = '';
    public $totalRegistros = 0;
    public $cant = 5;

    //propiedades de modelo

    public $Id;
    public $nombre;
    public $identificacion;
    public $telefono;
    public $correo;
    public $empresa;
     public $nit;
    public function render()
    {
        if ($this->search != '') {
            $this->resetPage();
        }
        $this->totalRegistros = Client::count();

        $clientes = Client::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);

        return view('livewire.client.client-component', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {

        $this->Id = 0;
        $this->clean();


        $this->dispatch('open-modal', 'modalClient');
    }

    public function store(){
        //dump('crear categoria');
        $rules =[
            'nombre' => 'required|min:5|max:255',
            'identificacion'=> 'required|max:15|unique:clients',
            'correo'=> 'max:255|email|nullable',
        ];

        $this->validate($rules);

        $client = new Client();
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

    public function edit(Client $client){

        $this->Id = $client->id;
        $this-> nombre = $client->nombre;
        $this-> correo = $client->correo;
        $this-> telefono = $client->telefono;
        $this-> identificacion = $client->identificacion;
        $this-> nit = $client->nit;
        $this-> empresa = $client->empresa;

        $this->dispatch('open-modal', 'modalClient');
        //dump($category);
    }

    public function update(Client $client){

        $rules =[
            'nombre' => 'required|min:5|max:255',
            'identificacion'=> 'required|max:15|unique:clients,id,'.$this->Id,
            'correo'=> 'max:255|email|nullable',
    ];

        $this->validate($rules);

        $client->nombre  = $this->nombre;
        $client->correo  = $this->correo;
        $client->telefono  = $this->telefono;
        $client->identificacion  = $this->identificacion;
        $client->nit  = $this->nit;
        $client->empresa  = $this->empresa;

        $client->update();

        $this->dispatch('close-modal', 'modalClient');
        $this->dispatch('msg', 'Cliente editad correctamente');

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
}
