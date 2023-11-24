<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    //Relacion poliformica image
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Atributos

    protected function stockLavel() : Attribute{
        return Attribute::make(
            get: function(){
                return $this->attributes['stock'] >= $this->attributes['stock_min'] ?
                '<span class="badge badge-success">'.$this->attributes['stock'].'</span>' :
                '<span class="badge badge-danger">'.$this->attributes['stock'].'</span>';
            }
        );
    }
}
