<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class SessionController extends Controller
{
    public function __construct(){
     $this->middleware('guest', ['except' => 'destroy']);
     $this->middleware('auth', ['only' => [ 'edit' , 'update' ]]);
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
   public function edit(User $user){
       return view('register.editPassword', compact('user'));
   }
   public function update(){
       
   }
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}
