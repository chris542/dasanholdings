<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   public function show(){
       //Cart::destroy();
       $cartProducts = Cart::content();
       $topProducts = Product::topProduct();
       return view('cart.show', compact('cartProducts' , 'topProducts'));
   } 

   public function store(){
       //find product
        $product = Product::find(request('id'));

        //Add to cart
        Cart::add( [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => request('qt'),
            'price' => $product->price,
            'options' => [
                'img' => "$product->img",
                'minimum'=>$product->minimum
            ]
        ]);

        return back();
   }
   public function update(){
       $rowID = request('rowID');
       Cart::update($rowID, request('qt'));
       return back();
   }
   public function destroy($rowID){
       Cart::remove($rowID);
      return back(); 
   }
   public function empty(){
       Cart::destroy();
      return back(); 
   }
}
