<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SubscriptionController extends Controller
{
    public function show(){
        $subscribed = User::where('isSubscribed',true)->get();
        return view('admin.subscription.show',compact('subscribed'));
    } 
}
