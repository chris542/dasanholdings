<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class TopProductController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
   public function admin(){
      $products = Product::where('isTopProduct','1')->orderBy('tpOrder')->get(); 
      return view('admin.product.adminTop',compact('products'));
   } 
   public function edit(Product $product){
       $categories = Category::all();
       return view('admin.product.editTop', compact('product', 'categories'));
   }
   public function update(Product $product){
       //Validate
       $this->validate(request(),[
           'name' => 'required|max:30',
           'category_id' => 'required',
           'description' => 'required',
           'price'=> 'required|min:1',
           'img' => 'mimes:jpeg,png,jpg',
           'tpOrder' => 'required'
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
            'img'=> "$filename",
            'tpOrder'=> request('tpOrder'),
            'isTopProduct' => request('isTopProduct'),
        ]);
       //Go back to Admin Product Page 
        return redirect('/admtp');
   }

   public function destroy(Product $product){
       $product->update([
           'isTopProduct'=> 0
       ]);
      return redirect('/admtp'); 
   }
    
}
