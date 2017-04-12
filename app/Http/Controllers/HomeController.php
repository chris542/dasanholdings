<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;
use App\Product;


class HomeController extends Controller
{
   public function index(){

       $navCat = Category::all();
       $banners = Banner::all();
       $topProducts = Product::where('isTopProduct', true)->orderby('tpOrder','asc')->get();

        return view('welcome', compact('navCat','banners','topProducts')); 
   } 
}
