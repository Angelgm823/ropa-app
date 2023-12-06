<?php

namespace App\Livewire\Sale;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
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

    //propiedades de pago
    public $pago=0;
    public $devuelve=0;

    public $updating=0;
    public function render()
    {
        if($this->search!= ''){
            $this->resetPage();
        }

        $this->totalRegistros = Product::count();
        if($this->updating==0){
            $this->pago = Cart::getTotal();
            $this->devuelve = $this->pago - Cart::getTotal();
        }


        return view('livewire.sale.sale-create',[
            'products' => $this->products,
            'cart'=> Cart::getCart(),
            'total'=> Cart::getTotal(),
            'totalArticulos'=> Cart::totalArticulos(),
        ]);
    }

    public function createSale(){
        $cart = Cart::getCart();
        if(count($cart) == 0){
            $this->dispatch('msg','No hay nada aqui :(',"danger");
            return;
            //dump('crear venta');
        }
        if($this->pago< Cart::getTotal()){
            $this->pago = Cart::getTotal();
            $this->devuelve = 0;
        }

        DB::transaction(function(){
            $sale = new Sale();
            $sale->total = Cart::getTotal();
            $sale->pago = $this->total;
            $sale->user_id = UserID();
            $sale->client_id = $this->client;
            $sale->fecha = date("Y-m-d");
        });

    }

    public function updatingPago($value){
        $this->updating = 1;
        $this->pago = $value;
        $this->devuelve = (int)$this->pago - Cart::getTotal();
    }

    #[On('add-product')]
    public function addProduct(Product $product){
        $this->updating = 0;
        Cart::add($product);
    }
    //Decrementa cantidad
    public function decrement($id){
        $this->updating = 0;
        Cart::decrement($id);
        $this->dispatch("incrementStock.{$id}");
    }
    //Incrementa cantidad
    public function increment($id){
        $this->updating = 0;
        Cart::increment($id);
        $this->dispatch("decrementStock.{$id}");
    }
    //elimina item
    public function removeItem($id, $qty){
        $this->updating = 0;
        Cart::removeItem($id);
        $this->dispatch("devolverStock.{$id}", $qty);
    }

    //cancela venta
    public function clear(){
        Cart::clear();
        $this->pago=0;
        $this->devuelve=0;
        $this->dispatch('msg', 'Venta cancelada');
        $this->dispatch('refreshProducts');
    }

    #[On('setPago')]
    public function setPago($valor){
        $this->updating=1;
        $this->pago = $valor;
        $this->devuelve = (int)$this->pago - Cart::getTotal();
    }

    //listado de productos
    #[Computed()]
    public function products(){
        return Product::where('name','LIKE','%'.$this->search.'%')
        ->orderBy('id','desc')
        ->paginate($this->cant);


    }
}
