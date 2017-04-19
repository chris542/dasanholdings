@extends('layouts.master')

@section('title')
{{ $product->category->name }} > {{ $product->name }}
@endsection
@section('content')

<div id="showProducts" class="container"><div class="row">

        <!--Category Nav-->
        @include('layouts.sideCategoryNav')
        <!--Category Nav End-->
        <div class="col-md-10 products-page">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="/category/{{ $product->category->id }}">{{ $product->category->name }}</a></li>
                        <li class="active"><a href="/category/{{ $product->id }}">{{ $product->name }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img class="img-responsive center-block" src="{{ asset('storage/products/') }}/{{ $product->img }}" alt="">
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>{{ $product->name }}</h2>
                    <div class="rating_box">
                        @for($i = 0; $i < $product->rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($i = 0; $i < ( 5 - $product->rating ); $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    </div>
                   <p> {!! nl2br(e($product->description)) !!}</p>
                    @if(Auth::check())
                    <form method="post" action="/addtocart" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="quantity" value="{{ $product->minimum }}" min="{{ $product->minimum }}" placeholder="Quantity">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-default btn-primary">Add to Cart</button>
                                        </span>
                                    </div>
                                </div>
                        </div> 
                    </form>
                    @endif
                </div>
            </div>
            <!--Comment Section-->
            @include('layouts.commentBox')
            <!--End Comment Section-->
            <h3>Relevant Products</h3>
            <div class="carousel carousel-showmanymoveone slide" id="carousel-tilenav" data-interval="false">
                 <div class="carousel-inner">
                    @foreach($product->category->product as $key => $pro)
                    @if($key == 0)
                    <div class="item active">
                    @else
                    <div class="item">
                    @endif
                       <div class="single-item col-xs-12 col-sm-6 col-md-2">
                            @if(Auth::check())
                            <div class="addtocart">
                                <a href="/addtocart">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </a>
                            </div>
                            @endif
                          <a href="/product/{{ $pro->id }} ">
                            <img src="{{ asset('storage/products') }}/{{ $pro->img }}" class="img-responsive center-block">
                            <div class="details">
                                <h4>{{$pro->name}}</h4>
                                <p>${{$pro->price}}</p>
                            </div>
                          </a>
                       </div>
                    </div>
                    @endforeach
                 </div>
                 <a class="left carousel-control" href="#carousel-tilenav" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                 <a class="right carousel-control" href="#carousel-tilenav" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
@include('layouts.contact')
    </div>
</div>


@endsection

