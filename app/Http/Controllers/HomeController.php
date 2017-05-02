<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;
use App\Product;


class HomeController extends Controller
{
   public function index(){
       $banners = Banner::all();
       $topProducts = Product::topProduct();
       return view('welcome', compact('banners','topProducts')); 
   } 
   public function delivery(){
        return view('delivery');
   }
   public function privacyandpolicy(){
      return view('privacyandpolicy');
   }
   public function termsofservice(){
      return view('termsofservice'); 
   }
}
