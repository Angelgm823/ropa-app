<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
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
}
