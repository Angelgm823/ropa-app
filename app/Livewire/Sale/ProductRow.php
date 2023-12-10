<?php

namespace App\Livewire\Sale;

use App\Models\Product;
use Livewire\Component;

class ProductRow extends Component
{

    public Product $product;
    public $stock;
    public $stockLabel;
    public $cantidad;

    protected function getListeners(){
        return [
            "decrementStock.{$this->product->id}" => "decrementStock",
            "incrementStock.{$this->product->id}" => "incrementStock",
            "refreshProducts" => "mount",
            "devolverStock.{$this->product->id}" => "devolverStock",
        ];
    }
    public function render()
    {
        $this->stockLabel = $this->stockLabel();
        return view('livewire.sale.product-row');
    }

    public function mount(){
        $this->stock = $this->product->stock;
    }

    public function addProduct(Product $product){
        if($this->stock==0){
            return;
        }
        $this->dispatch('add-product',$product);
        $this->stock--;
    }


    public function decrementStock(){
        $this->stock--;
    }

    public function incrementStock(){
        if($this->stock==$this->product->stock-1){
            return;
        }
        $this->stock++;
    }

    public function devolverStock($cantidad){
        $this->stock = $this->$cantidad;
    }

    public function stockLabel(){
        if($this->stock<=$this->product->stock_min){
            return '<span class="badge badge-pill badge-danger">'.$this->stock.'</span>';
        }else{
            return '<span class="badge badge-pill badge-success">'.$this->stock.'</span>';
        }
    }
}
