<?php

namespace App;

class Cart
{
    public function add($product)
    {
        $cart = session()->get('cart');

        if(! isset($cart[$product->id])) {
            $quantity = 1;
        } else {
            $quantity = ++$cart[$product->id][ 'quantity' ];
        }

        $cart[$product->id] = [
            'name'     => $product->name,
            'quantity' => $quantity,
            'price'    => $product->price
        ];

        session()->put('cart', $cart);

        return session('cart');
    }
}
