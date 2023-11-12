<?php

namespace App\Livewire\Category;

use Livewire\Attributes\On;
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
    public $cant=5;

    //propiedades de modelo
    public $name;
    public $Id;
    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Category::count();
        $categories = Category::where('name', 'like', '%'.$this->search. '%')
        ->orderBy('id', 'desc')
        ->paginate($this->cant);
        return view('livewire.category.category-component',[
            'categories' => $categories
        ]);
    }




    public function create(){

        $this->Id=0;

        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalcategory');
    }

    //crea categoria
    public function store(){
        //dump('crear categoria');
        $rules =[
            'name' => 'required|min:5|max:255|unique:categories'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre no puede ser menor a 3 letras',
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

    public function edit(Category $category){

        $this->Id = $category->id;

        $this-> name = $category->name;

        $this->dispatch('open-modal', 'modalcategory');
        //dump($category);
    }

    public function update(Category $category){

        $rules =[
            'name' => 'required|min:5|max:255|unique:categories,id,'.$this->Id
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre no puede ser menor a 3 letras',
            'name.max' => 'El nombre es muy largo',
            'name.unique' => 'El nombre ya esta registrado'
        ];

        $this->validate($rules, $messages);

        $category->name  = $this->name;
        $category->update();

        $this->dispatch('close-modal', 'modalcategory');
        $this->dispatch('msg', 'Categoria editada correctamente');

        $this->reset(['name']);
    }

    #[On('destroyCategory')]
    public function destroy($id){
        $category = Category::findOrfail($id);

        $category->delete();
        $this->dispatch('msg', 'Categoria a sido eliminada correctamente');
        $this->reset(['name']);
    }
}
