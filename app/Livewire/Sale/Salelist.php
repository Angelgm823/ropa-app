<?php

namespace App\Livewire\Sale;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Ventas')]
class Salelist extends Component
{
    use WithPagination;

    //propiedades de clase
    public $search='';
    public $totalRegistros=0;
    public $cant=5;


    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Sale::count();

        $sales = Sale::where('id', 'like', '%'.$this->search. '%')
        ->orderBy('id', 'desc')
        ->paginate($this->cant);


        return view('livewire.sale.salelist',[
            "sales"=>$sales
        ]);
    }

    #[On("destroySale")]
    public function destroy($id){
        $sale = Sale::findOrfail($id);

        foreach($sale->items as $item){
            Product::find($item->id)->increment('stock',$item->cantidad);
            $item->delete();
        }
        $sale->delete();

        $this->dispatch('msg','venta eliminada');
    }
}
