<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Productos')]

class ProductComponent extends Component
{
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedades de modelo
    public $Id;
    public $name;
    public $category_id;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $codigo_barras;
    public $stock = 10;
    public $stock_minimo;
    public $fecha_vencimiento;
    public $active = 1;
    public $image;

    public function render()
    {
        $this->totalRegistros = Product::count();
        $products = Product::where('name', 'like', '%'.$this->search. '%')
        ->orderBy('id', 'desc')
        ->paginate($this->cant);
        return view('livewire.product.product-component',[
            'products' => $products
        ]);
    }

    public function create(){

        $this->Id=0;

        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalProduct');
    }


    public function store(){
        //dump('crear producto');
        $rules =[
            'name' => 'required|min:5|max:255|unique:products',
            'descripcion' =>'max:200',
            'precio_compra'=> 'numeric|nullable',
            'precio_venta'=> 'required|numeric|nullable',
            'stock'=> 'required|numeric',
            'stock_minimo'=> 'mumeric|nullable',
            'image'=> 'image|max:2046|nullable',
            'category_id'=> 'required|numeric',
        ];


        $this->validate($rules);
/*
        $category = new Category();
        $category->name = $this->name;
        $category->save();

        $this->dispatch('close-modal', 'modalcategory');
        $this->dispatch('msg', 'Categoria creada correctamente');

        $this->reset(['name']);*/
    }

}
