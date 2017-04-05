<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    public function update(){
       $banners =  Banner::all();
        
       return view('admin/banner/update', compact('banners'));

    }
}
