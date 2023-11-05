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
    public $name;
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
            'name' => 'required|min:5|max:255|unique:categories'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El no puede ser menor a 3 letras',
            'name.max' => 'El nombre es muy largo',
            'name.unique' => 'El nombre ya esta registrado'
        ];
        $this->validate($rules, $messages);

        $category = new Category();
        $category->name = $this->name;
        $category->save();
    }
}
