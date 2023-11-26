<?php

namespace App\Livewire\Sale;

use App\Models\Product;
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

        $products = Product::where('name','LIKE','%'.$this->search.'%')
        ->orderBy('id','desc')
        ->paginate($this->cant);

        return view('livewire.sale.sale-create',[
            'products' => $products
        ]);
    }
}
