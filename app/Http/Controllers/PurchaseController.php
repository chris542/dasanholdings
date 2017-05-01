<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\invoice;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PurchaseController extends Controller
{
    public function store(){
        $user = auth()->user();
        $cartProducts = Cart::content();
        $dateOfPurchase = Carbon::now();

        //\Mail::to($user)->send(new invoice($user));
        //\Mail::to('chris.sm.kang542@gmail.com')->send(new invoice($user));

        Cart::destroy();
        return view('redirects/purchaseComplete', compact('user', 'cartProducts', 'dateOfPurchase'));
    }
}
