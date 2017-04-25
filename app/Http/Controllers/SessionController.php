<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class SessionController extends Controller
{
    public function __construct(){
     $this->middleware('guest', ['except' => [ 'destroy', 'show' ]]);        
     $this->middleware('auth');
    }
   public function create(){
       return view('session.create');
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
   public function show(User $user){
       return view('session.show', compact('user'));
   }
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}
