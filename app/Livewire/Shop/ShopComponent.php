<?php

namespace App\Livewire\Shop;

use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Title("Tienda")]
class ShopComponent extends Component
{

    use WithFileUploads;
    public $shop;

    public $nombre;
    public $slogan;
    public $telefono;
    public $correo;
    public $direccion;
    public $ciudad;
    public $image;
    public $imageModel;

    public function render()
    {
        return view('livewire.shop.shop-component');
    }

    public function mount()
    {
        $this->shop = Shop::first();
    }

    public function edit()
    {
        $this->clean();

        $this->nombre = $this->shop->nombre;
        $this->slogan = $this->shop->slogan;
        $this->telefono = $this->shop->telefono;
        $this->direccion = $this->shop->direccion;
        $this->ciudad = $this->shop->ciudad;
        $this->dispatch('open-modal', 'modalShop');
    }

    public function update(){
        $rules = [
            'nombre'=> 'required|min:3|max:255',
            'slogan'=> 'max:255|nullable',
            'telefono'=> 'max:255|nullable',
            'correo'=> 'email|nullable',
            'direccion'=> 'max:255|nullable',
            'ciudad'=> 'max:255|nullable',
            'image'=> 'image|max:2048|nullable',
        ];

        $this->validate($rules);

        $this->shop->nombre = $this->nombre;
        $this->shop->slogan = $this->slogan;
        $this->shop->telefono = $this->telefono;
        $this->shop->direccion = $this->direccion;
        $this->shop->correo = $this->correo;
        $this->shop->ciudad = $this->ciudad;


        $this->shop->update();


        if($this->image){
            if($this->shop->image!=null){
                Storage::delete('public/'.$this->shop->image->url);
                $this->shop->image()->delete();
            }
            $customName = 'shop/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $this->shop->image()->create(['url' => $customName]);
        }
        $this->dispatch('close-modal', 'modalShop');
        $this->dispatch('msg', 'Datos actualizados');

        $this->clean();
        $this->mount();
    }

    public function clean()
    {
        $this->reset([
            'nombre',
            'slogan',
            'telefono',
            'correo',
            'direccion',
            'ciudad',
            'image',
            'imageModel',
        ]);

        $this->resetErrorBag();
    }
}
