<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class SessionController extends Controller
{
    public function __construct(){
     $this->middleware('guest', ['except' => 'destroy']);        
    }
   public function create(){
       $categories = Category::all();
       return view('session.create', compact('categories'));
   } 
   public function store(){
       //Authenticate if validation is wrong
       if(! auth()->attempt(request(['email','password']))){
           return back()->withErrors([
               'message'=>'Check your credentials and try again!'
           ]);
       }
       //if successful go home
       return redirect()->home();
   }
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}
