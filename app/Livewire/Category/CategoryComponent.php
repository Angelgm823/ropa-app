<?php

namespace App\Livewire\Category;

use Livewire\Attributes\Title;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Categorias')]

class CategoryComponent extends Component
{

    use WithPagination;

    //propiedades de clase
    public $search='';
    public $totalRegistros=0;

    //propiedades de modelo
    public $name;
    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Category::count();
        $categories = Category::where('name', 'like', '%'.$this->search. '%')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('livewire.category.category-component',[
            'categories' => $categories
        ]);
    }

    public function mount(){

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

        $this->dispatch('close-modal', 'modalcategory');
        $this->dispatch('msg', 'Categoria creada correctamente');

        $this->reset(['name']);
    }
}
