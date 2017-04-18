<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;

class CommentController extends Controller
{
    public function store(Product $product){
        //Validate the body
        $this->validate(request(), [
          'body'=>'required|min:1|max:50',
          'rating' => 'required'
        ]);

        //Store body in database
        $product->addComment(request('user_id'), request('body'), request('rating'));

        //Average Rating
        $product->updateRating();
        

        //return
        return back();
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return back(); 
    }
}
