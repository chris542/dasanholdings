<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Anam\Phpcart\Cart;

class CartController extends Controller
{
   public function show(){
       dd(Session::get);
       return view('cart.show', compact('cartProducts'));
   } 

   public function store(){
       //find product
        $product = Product::find(request('id'));

        //Add to cart
        $cart = new Cart();
        $cart->add([
            'id'=> $product->id,
            'name'=> $product->name,
            'price'=> $product->price,
            'img'=> $product->img,
            'quantity'=> request('qt'),
        ]);

        return back();
   }
}
