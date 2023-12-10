<?php

namespace App\Livewire\Home;

use App\Models\Item;
use App\Models\Sale;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Inicio')]

class Inicio extends Component
{
    public $ventasHoy=0;
    public $totalventasHoy=0;
    public $articulosHoy=0;
    public $productosHoy=0;
    public $listTotalVentasMes='';


    public function render()
    {
        $this->sales_today();

        return view('livewire.home.inicio');
    }

    public function sales_today(){
        $this->ventasHoy = Sale::whereDate('fecha',date('Y-m-d'))->count();
        $this->totalventasHoy = Sale::whereDate('fecha',date('Y-m-d'))->sum('total');
        $this->articulosHoy = Item::whereDate('fecha',date('Y-m-d'))->sum('cantidad');
        $this->productosHoy = Item::whereDate('fecha',date('Y-m-d'))->groupBy('product_id')->count();
    }

}
