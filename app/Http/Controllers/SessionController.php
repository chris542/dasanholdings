<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class SessionController extends Controller
{
   public function create(){
       $categories = Category::all();
       
       return view('session.create', compact('categories'));
   } 
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}
