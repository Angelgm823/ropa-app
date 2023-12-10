<?php

namespace App\Livewire\Usuarios;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("producto")]
class Producto extends Component
{
    public Product $product;
    public function render()
    {

        return view('livewire.usuarios.producto');
    }
}
