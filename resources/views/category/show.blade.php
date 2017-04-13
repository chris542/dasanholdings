@extends('layouts.master')

@section('title')
{{ $category->name }}
@endsection
@section('content')

<div id="showProducts" class="container">
    <div class="row">
        @include('layouts.sideCategoryNav')
        <div class="col-md-10 products-page">
           <ol class="breadcrumb">
               <li><a href="/">Home</a></li>
               <li class="active"><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
           </ol>
            <h2>{{ $category->name }}</h2>
            <p>{{ $category->description }}</p>
            <div class="row">
                @foreach($category->product as $product)
                <div class="col-md-3 col-sm-4">
                        <div class="thumbnail">
                                <div class="cart_btn">
                                    <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                </div>
                                <div class="img-holder">
                                    <img class="img-responsive center-block" src="{{ asset('storage/products') }}/{{ $product->img }}" alt="">
                                </div>
                                <div class="details">
                                    <a href="/product/{{ $product->id }} ">
                                        <h4>{{ $product->name }}</h4>
                                        <p>${{ $product->price }}</p>
                                    </a>
                                </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('layouts.contact')

@endsection
