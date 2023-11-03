<?php

namespace App\Livewire\Category;

use Livewire\Attributes\Title;
use App\Models\Category;
use Livewire\Component;

#[Title('Categorias')]

class CategoryComponent extends Component
{
    //propiedades de clase

    public $totalRegistros=0;

    //propiedades de modelo
    public $nombre;
    public function render()
    {
        return view('livewire.category.category-component');
    }

    public function mount(){
        $this->totalRegistros = Category::count();
    }

    //crea categoria
    public function store(){
        //dump('crear categoria');
        $rules =[
            'nombre' => 'required|min:5|max:255|unique:categories'
        ];
        $messages = [
            'nonbre.required' => 'El nombre es requerido',
            'nonbre.min' => 'El no puede ser menor a 3 letras',
            'nonbre.max' => 'El nombre es muy largo',
            'nonbre.unique' => 'El nombre ya esta registrado'
        ];
        $this->validate($rules, $messages);
    }
}
