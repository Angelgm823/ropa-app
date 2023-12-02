<?php

namespace App\Livewire\Sale;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
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
            'totalArticulos'=> Cart::totalArticulos(),
        ]);
    }

    #[On('add-product')]
    public function addProduct(Product $product){
        Cart::add($product);
    }
    //Decrementa cantidad
    public function decrement($id){
        Cart::decrement($id);
        $this->dispatch("incrementStock.{$id}");
    }
    //Incrementa cantidad
    public function increment($id){
        Cart::increment($id);
        $this->dispatch("decrementStock.{$id}");
    }
    //elimina item
    public function removeItem($id, $qty){
        Cart::removeItem($id);
        $this->dispatch("devolverStock.{$id}", $qty);
    }

    //cancela venta
    public function clear(){
        Cart::clear();
        $this->dispatch('msg', 'Venta cancelada');
        $this->dispatch('refreshProducts');
    }
    //listado de productos
    #[Computed()]
    public function products(){
        return Product::where('name','LIKE','%'.$this->search.'%')
        ->orderBy('id','desc')
        ->paginate($this->cant);


    }
}
