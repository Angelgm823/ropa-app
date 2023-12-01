<?php

namespace App\Models;


class Cart
{

    //agrega producto al carro
    public  static function  add(Product $product)
    {

        // add the product to cart
        \Cart::session(userID())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->precio_venta,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

    }
    //obtener contenido del carrito
    public static function getCart(){
        $cart = \Cart::session(userID())->getContent();
        return $cart->sort();
    }

    //devolver total
    public static function getTotal(){
        return \Cart::session(userID())->getTotal();
}
}
