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
    public static function getCart()
    {
        $cart = \Cart::session(userID())->getContent();
        return $cart->sort();
    }

    //devolver total
    public static function getTotal()
    {
        return \Cart::session(userID())->getTotal();
    }
    //devolver decremento
    public static function decrement($id)
    {
         \Cart::session(userID())->update($id,[
            'quantity'=> -1,
         ]);
    }
    //devolver incremento
    public static function increment($id)
    {
         \Cart::session(userID())->update($id,[
            'quantity'=> +1,
         ]);
    }
    public static function removeItem($id)
    {
         \Cart::session(userID())->remove($id);
    }
    //limpia el carrito
    public static function clear()
    {
         \Cart::session(userID())->clear();
    }
}
