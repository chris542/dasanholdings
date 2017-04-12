<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('admin',['except'=>'show']);
    }
    public function show(Product $product){
       $navCat = Category::all();
        
       return view('product.show',compact('product', 'navCat')); 
    }
   public function admin(){
      $products = Product::orderBy('category_id')->orderBy('order')->get(); 
      return view('admin.product.admin',compact('products'));
   } 

   public function create(){
       $categories = Category::all();
       return view('admin.product.create', compact('categories'));
   }
   public function store(){
       //Validate
       $this->validate(request(),[
           'name' => 'required|max:30',
           'category_id' => 'required',
           'description' => 'required',
           'price'=> 'required|min:1',
           'minimum' => 'required',
           'img' => 'required|mimes:jpeg,png,jpg',
       ]);
       //Upload the file
        $tempFile = request()->file('img');
        $filename= $tempFile->getClientOriginalName();
        $ext = $tempFile->guessClientExtension();
        $tempFile->storeAs('/public/products/', "$filename");

        //Number of items in selected category
        $a = Product::where('category_id', request('category_id'))->get();

       //Assign to Database
        $newProduct = Product::create([
            'name'=>request('name'),
            'category_id' => request('category_id'),
            'description' => request('description'),
            'price'=>request('price'),
            'minimum' => request('minimum'),
            'img'=> "$filename",
            'order'=>(count( $a ) + 1),
            'isTopProduct' => request('isTopProduct'),
        ]);
       //Go back to Admin Product Page 
        return redirect('/admpro');
   }

   public function edit(Product $product){
       $categories = Category::all();
       return view('admin.product.edit', compact('product', 'categories'));
   }

   public function update(Product $product){
       //Validate
       $this->validate(request(),[
           'name' => 'required|max:30',
           'category_id' => 'required',
           'description' => 'required',
           'price'=> 'required|min:1',
           'minimum' => 'required',
           'img' => 'mimes:jpeg,png,jpg',
           'order' => 'required'
       ]);
       //Upload the file
        if(request()->img){
            $tempFile = request()->file('img');
            $filename= $tempFile->getClientOriginalName();
            $ext = $tempFile->guessClientExtension();
            $tempFile->storeAs('/public/products/', "$filename");
        } else {
            $filename = $product->img;
        }

       //Assign to Database
        $product->update([
            'name'=>request('name'),
            'category_id' => request('category_id'),
            'description' => request('description'),
            'price'=>request('price'),
            'minimum' => request('minimum'),
            'img'=> "$filename",
            'order'=> request('order'),
            'isTopProduct' => request('isTopProduct'),
        ]);
       //Go back to Admin Product Page 
        return redirect('/admpro');
   }

   public function destroy(Product $product){
       $product->delete();
      return redirect('/admpro'); 
   }
}
