<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $products = Product::all();
        }catch (\Exception $e){
            $products = collect(new Product);
        }

        return view('products', ['products' => $products]);
    }

    /**
     * Simple as hell cart system. If I ever see you
     * code something like this for real you will
     * be fired over Skype on your birthday.
     *
     */
    public function cart($id, Cart $cart)
    {
        $product = Product::find($id);

        if (!$product) {
            about(404);
        };

        $cart->add($product);

        return redirect()->back()->with('status', 'Product added to cart successfully');
    }

    public function checkout()
    {
        return view('checkout', ['items' => session()->get('cart')]);
    }

    /**
     *
     */
    public function specials()
    {
        return view ('specials');
    }
}
