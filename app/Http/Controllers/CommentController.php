<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['only'=>'admin']);
    }
    public function admin(){
        $comments = Comment::all();
        return view('admin.comment.admin',compact('comments'));
    }
    public function store(Product $product){

        //If the user has reviewed already, you can't review
        if(count($product->comment->where('user_id', request('user_id')))){
            return back()->withErrors([
                'message' => 'You have already reviewed on this product!'
            ]);
        } else {
            //Validate the body
            $this->validate(request(), [
              'body'=>'required|min:1|max:50',
              'rating' => 'required'
            ]);

            //Add comment to product
            $product->addComment(request('user_id'), request('body'), request('rating'));

            //Average Rating
            $product->updateRating();

            //return
            return back();            
        }
    }
    public function destroy(Comment $comment){
        $comment->delete();
        $comment->product->updateRating();
        return back(); 
    }
}
