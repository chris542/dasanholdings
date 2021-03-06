<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;


class BannerController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function admin(){
       //Show all banners
       $banners =  Banner::all();
       return view('admin.banner.admin', compact('banners'));
    }

    public function create(){
        //Show Admin Banner Create page
        return view('admin.banner.create');
    }

    public function store(){
        //Validates the form
        $this->validate(request(),[
            'title'=>'required|max:50',
            'description' => 'required',
            'bgImg' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Upload the file
       $filename = Banner::uploadFile(request()->file('bgImg'), '/public/banners/');

        //Assign to database
        $newBanner = Banner::create([
            'title' => request('title'),
            'description' => request('description'),
            'bgImg' => "$filename",
        ]);

        //Go back to Admin Banner page
        return redirect('/admbanner');
    }

    public function edit(Banner $banner){
       return view('admin.banner.edit', compact('banner')); 
    }

    public function update(Banner $banner){
        //Validate
        $this->validate(request(),[
            'title'=>'required|max:50',
            'description' => 'required',
            'bgImg' => 'mimes:jpeg,png,jpg',
        ]);
       
       //Upload the file
        if(request()->bgImg){
           $filename = Banner::uploadFile(request()->file('bgImg'), '/public/banners/');
        } else {
            $filename = $banner->bgImg;
        }
        
        //Assign to database
        $banner->update([
            'title' => request('title'),
            'description' => request('description'),
            'bgImg' => "$filename",
        ]);
        
        //Go back to Admin Banner page
        return redirect('/admbanner');
    }

   public function destroy(Banner $banner){
       $banner->delete();
       return redirect('/admbanner');
    }
}
