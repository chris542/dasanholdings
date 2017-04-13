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
       return view('product.show',compact('product')); 
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
       $filename = Product::uploadFile(request()->file('img'), '/public/products/');

        //Number of items in selected category
        $a = count( Product::where('category_id', request('category_id'))->get() );

       //Assign to Database
        $newProduct = Product::create([
            'name'=>request('name'),
            'category_id' => request('category_id'),
            'description' => request('description'),
            'price'=>request('price'),
            'minimum' => request('minimum'),
            'img'=> "$filename",
            'order'=>($a + 1),
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
           $filename = Product::uploadFile(request()->file('img'), '/public/products/');
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
