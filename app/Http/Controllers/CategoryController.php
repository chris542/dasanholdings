<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function admin(){
        $categories = Category::all();

        return view('admin.category.admin', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(){
        //Validate the form
        $this->validate(request(),[
            'name' => 'required|max:30',
            'description' => 'required|min:1'
        ]);

        //Assign to database
        $newCategory = Category::create([
            'name' => request('name'),
            'description' => request('description')
        ]);
        
        //Go back to Admin Category
        return redirect('/admcat');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }
    public function update(Category $category ){
        $this->validate(request(),[
            'name' => 'required|max:30',
            'description' => 'required|min:1'
        ]);

        //Assign to database
        $category->update([
            'name' => request('name'),
            'description' => request('description')
        ]);
        
        //Go back to Admin Category
        return redirect('/admcat');
        
    }
   public function destroy(Category $category){
        $category->delete();
       return redirect('/admcat');
    }
    
    
}
