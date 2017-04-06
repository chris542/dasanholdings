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
}
