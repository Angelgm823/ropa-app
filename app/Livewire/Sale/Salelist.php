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

    public $totalVentas=0;
    public $dateInicio;
    public $dateFin;


    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Sale::count();

        $salesQuery = Sale::where('id', 'like', '%'.$this->search. '%');

        if($this->dateInicio && $this->dateFin){
            $salesQuery = $salesQuery->whereBetween('fecha',[$this->dateInicio,$this->dateFin]);

            $this->totalVentas = $salesQuery->sum('total');
        }else{
            $this->totalVentas = Sale::sum('total');
        }



        $sales = $salesQuery

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

    #[On('setDates')]
    public function setDates(
        $fechaInicio, $fechaFinal
    ){
        //dump($fechaInicio, $fechaFinal);

        $this->dateInicio = $fechaInicio;
        $this->dateFin = $fechaFinal;
    }
}
