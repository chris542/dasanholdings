<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//LOG IN
class SessionController extends Controller
{
    public function __construct(){
    $this->middleware('auth')->only([ 'edit', 'update' ]);
     $this->middleware('guest')->only(['create', 'store']);
    }
   public function create(){
       //Login Page
       return view('session.create');
   } 
   public function store(){
       //Login Process
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
       //Editing Password
       if($user->id === auth()->user()->id){
           return view('session.edit', compact('user'));
       }
       return back();
   }
   public function update(User $user){
       //Editing Password process
       if(Hash::check(request('password'), $user->password)){
           //If Old Password is confirmed is matched
            $this->validate(request(), [
                'newPassword'=> 'required|confirmed',
            ]);

           $user->update([
               'password' =>bcrypt(request('newPassword'))
           ]);

            return redirect()->route('userDetail', ['user'=>auth()->user()->id]);


       } else {
           //if Old password is not matched
           return back()->withErrors([
               'message'=>'Your old password does not match! Please try again'
           ]);
       }
   }
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}
