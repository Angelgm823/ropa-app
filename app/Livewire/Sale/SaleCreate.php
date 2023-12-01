<?php

namespace App\Livewire\Sale;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Ventas")]
class SaleCreate extends Component
{

    use WithPagination;

    //Propiedad de clase

    public $search='';
    public $cant=5;
    public $totalRegistros=0;
    public function render()
    {
        if($this->search!= ''){
            $this->resetPage();
        }

        $this->totalRegistros = Product::count();


        return view('livewire.sale.sale-create',[
            'products' => $this->products,
            'cart'=> Cart::getCart(),
            'total'=> Cart::getTotal(),
        ]);
    }

    public function addProduct(Product $product){
        //dump($product);
        Cart::add($product);
    }
    //listado de productos
    #[Computed()]
    public function products(){
        return Product::where('name','LIKE','%'.$this->search.'%')
        ->orderBy('id','desc')
        ->paginate($this->cant);


    }
}
