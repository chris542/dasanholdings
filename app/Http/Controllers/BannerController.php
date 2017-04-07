<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;


class BannerController extends Controller
{
    public function admin(){
       //Show all banners
       $banners =  Banner::all();
       return view('admin.banner.admin', compact('banners'));
    }

    public function create(){
        //Show Admin Banner Create page
        return view('admin.banner.create');
    }

    public function store(Request $req){
        //Validates the form
        $this->validate(request(),[
            'title'=>'required',
            'description' => 'required|max:50',
            'bgImg' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Upload the file
        $bgImg = request()->file('bgImg');
        $filename= $bgImg->getClientOriginalName();
        $ext = $bgImg->guessClientExtension();
        $bgImg->storeAs('/public/banners/', "$filename");

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

    public function destroy(Banner $banner){
        $banner->delete();
       return redirect('/admbanner');
    }
}
