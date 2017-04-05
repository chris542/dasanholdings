<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;


class HomeController extends Controller
{
   public function index(){

       $categories = Category::all();
       $banners = Banner::all();

        return view('welcome', compact('categories','banners')); 
   } 
}
