<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

#[Title('Productos')]

class ProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $totalRegistros = 0;
    public $cant = 5;
    //propiedades de modelo
    public $Id;
    public $name;
    public $category_id;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $codigo_barras;
    public $stock = 0;
    public $stock_min;
    public $fecha_vencimiento;
    public $active = 10;
    public $image;

    public function render()
    {
        $this->totalRegistros = Product::count();
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
        return view('livewire.product.product-component', [
            'products' => $products
        ]);
    }

    #[Computed()]
    public function categories()
    {
        return Category::all();
    }

    public function create()
    {

        $this->Id = 0;

        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalProduct');
    }


    public function store()
    {
        //dump('crear producto');
        $rules = [
            'name' => 'required|min:5|max:255|unique:products',
            'descripcion' => 'max:200',
            'precio_compra' => 'numeric|nullable',
            'precio_venta' => 'required|numeric|nullable',
            'stock' => 'required|numeric',
            'stock_min' => 'mumeric|nullable',
            'image' => 'image|max:2046|nullable',
            'category_id' => 'required|numeric',
        ];


        $this->validate($rules);
        $product = new Product();


        $product->name = $this->name;
        $product->descripcion = $this->descripcion;
        $product->precio_compra = $this->precio_compra;
        $product->precio_venta = $this->precio_venta;
        $product->stock = $this->stock;
        $product->stock_min = $this->stock_min;
        $product->codigo_barras = $this->codigo_barras;
        $product->fecha_vencimiento = $this->fecha_vencimiento;
        $product->category_id = $this->category_id;
        $product->active = $this->active;
        $product->save();


        if ($this->image) {
            $customName = 'products/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);

            $product->image()->create(['url' => $customName]);


        }
        $this->dispatch('close-modal', 'modalcategory');
        $this->dispatch('msg', 'Producto creado correctamente');

        $this->clean();
    }

    public function clean(){
        $this->reset([
            'Id',
            'name',
            'descripcion',
            'image',
            'precio_compra',
            'precio_venta',
            'stock',
            'stock_min',
            'codigo_barras',
            'fecha_vencimiento',
            'category_id',
            'active',
        ]);
    }

}
