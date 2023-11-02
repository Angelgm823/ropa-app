<?php

namespace App\Livewire\Category;
use Livewire\Attributes\Title;

use Livewire\Component;
#[Title('Categorias')]

class CategoryComponent extends Component
{
    public function render()
    {
        return view('livewire.category.category-component');
    }
}
