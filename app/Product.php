<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'img','price', 'order', 'isTopProduct', 'tpOrder', 'rating'
    ]; 

    protected $casts =[
        'isTopProduct' => 'boolean',
    ];

    public function category(){
       return $this->belongsTo('App\Category');
    }
    public function comment(){
       return $this->hasMany('App\Comment');
    }
    public static function topProduct(){
        return static::where('isTopProduct', true)->orderby('tpOrder','asc')->get();
    }

    public static function uploadFile($reqFile, $url){
        $tempFile = $reqFile;
        $filename= $tempFile->getClientOriginalName();
        $ext = $tempFile->guessClientExtension();
        $tempFile->storeAs($url, "$filename");
        return $filename;
    }
    public function addComment($user_id, $body, $rating){
        $this->comment()->create([
            'product_id' => $this->id,
            'user_id' => $user_id,
            'body'=> $body,
            'rating' => $rating
        ]);
    }
}
