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
}
