<?php

namespace App\Http\Controllers;

use App\User;
use App\Banner;
use App\Category;
use Illuminate\Http\Request;
use App\Mail\registrationComplete;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['only'=>[ 'admin', 'destroy' ]]);
        $this->middleware('auth', ['only'=>[ 'edit', 'update' ]]);
        $this->middleware('guest', [ 'only'=> ['create', 'store']]);
    }

    public function admin(){
        //Admin Page
        $users = User::all();
       return view('admin.user.admin', compact('users')); 
    }
    
    public function create(){
        //Registering Page
       return view('register.create');
    }

    public function store(){
        //Register Process
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

        //Send a registration Complete email
        //\Mail::to($user)->send(new registrationComplete($user));

        //Go back home
        return view('redirects.registerComplete',compact('user'));
    }
    public function show(User $user){
        //Personal Page
        if($user->id === auth()->user()->id){
           return view('register.show', compact('user'));
        }
        return back();
    }
    public function edit(User $user){
        //Editing Personal Details
        if($user->id === auth()->user()->id){
           return view('register.edit', compact('user'));
        }
        return back();
    }
    public function update(User $user){
        //Updating Process
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
        
        return redirect()->route('userDetail', ['user'=>auth()->user()->id]);
    }
    public function destroy(User $user){
       $user->delete(); 
       return redirect('/admusers');
    }
}
