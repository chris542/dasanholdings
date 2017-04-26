<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;
use App\User;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['only'=>[ 'admin', 'destroy' ]]);
        $this->middleware('guest', [ 'only'=> [ 'create', 'store' ]]);
    }

    public function admin(){
        $users = User::all();
       return view('admin.user.admin', compact('users')); 
    }
    
    public function create(){
       return view('register.create');
    }

    public function store(){
        //Validation
        $this->validate(request(), [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password'=> 'required|confirmed',
            'mobile'=> 'required|min:7',
            'phone' => 'required|min:7',
            'address' => 'required|min:5'
        ]);

        //Create user
        $user = User::create([ 
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'mobile' => request('mobile'),
            'phone' => request('phone'),
            'address' => request('address'),
            'isSubscribed' =>request('isSubscribed'),
        ]);

        //Signin
        auth()->login($user);

        //Go back home
        return redirect()->home();
    }
    public function show(User $user){
       return view('register.show', compact('user'));
    }
    public function edit(User $user){
       return view('register.edit', compact('user'));
    }
    public function update(User $user){
        //Validation
        $this->validate(request(), [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'mobile'=> 'required|min:7',
            'phone' => 'required|min:7',
            'address' => 'required|min:5'
        ]);

        $user->update([ 
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'mobile' => request('mobile'),
            'phone' => request('phone'),
            'address' => request('address'),
            'isSubscribed' =>request('isSubscribed'),
        ]);
        
        return redirect()->route('userDetail', ['user'=>$user->id]);
    }
    public function destroy(User $user){
       $user->delete(); 
       return redirect('/admusers');
    }
}
