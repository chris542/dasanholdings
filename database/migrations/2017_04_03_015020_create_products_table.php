<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->text('description');
            $table->string('img');
            $table->float('price', 8, 2);
            $table->integer('minimum')->default(1);
            $table->integer('order')->default(0);
            $table->boolean('isTopProduct')->default(false);
            $table->integer('tpOrder')->default(0);
            $table->integer('rating')->default(5);
            $table->timestamps();
        });
    }

    public function setFirstNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
