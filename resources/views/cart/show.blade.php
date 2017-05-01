@extends('layouts.master')

@section('title')
My Cart
@endsection
@section('content')
<div id="myCart" class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active"><a href="/mycart">My Cart</a></li>
            </ol>
        </div>
    </div>

    <h2>My Cart</h2>
    <!--Table-->
    <table class="table table-responsive table-condensed table-hover {{ !Cart::count() ?  'hidden' : '' }}">
        <thead>
            <tr>
                <td>Product</td>
                <td>Image</td>
                <td>Quantity</td>
                <td class="price">price</td>
                <td class="update">Update</td>
                <td class="remove">Remove</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cartProducts as $product)
            <tr>
                <form id="product-{{ $product->id }}" class="form-horizontal updateCart">
                    {{ csrf_field() }}
                    <td class="col-xs-1">{{ $product->name }}</td>
                    <td class="col-xs-1"><img style="max-width: 30px" class="img-responsive" src="{{ asset('/storage/products') }}/{{ $product->options->img }}" alt=""></td>
                    <td class="col-xs-1">
                        <div class="form-group">
                            <input form="product-{{ $product->id }}" type="hidden" name="rowID" value="{{ $product->rowId }}" required>
                            <input form="product-{{ $product->id }}" class="form-control" type="number" name="qt" min="{{ $product->options->minimum }}" value="{{ $product->qty }}" required>
                        </div>
                    </td>
                    <td class="col-xs-1 price">${{ $product->price }}</td>
                    <td class="col-xs-1 update">
                      <button form="product-{{ $product->id }}" type="submit" class="btn btn-default">Update</button>
                    </td>
                    <td class="col-xs-1 remove">
                        <a class="btn btn-default btn-danger" href="/removeCart/{{ $product->rowId }}"><i class="fa fa-times"></i></a>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--End Table-->

    <!--Total-->
    <div class="row summary {{ !Cart::count() ?  'hidden' : '' }}">
        <div class="col-sm-12">
           <div class="subtotal">
               Subtotal : ${{  Cart::subtotal() }} 
           </div>
           <div class="tax">
               Tax : ${{ ( Cart::tax()) }} 
           </div>
           <div class="total">
               Total : ${{ ( Cart::total()) }} 
           </div>
            <form method="post" action="/purchase" class="form-horizontal">
                <div class="form-group cart_controllers">
                  <a href="/destroyCart" class="btn btn-default btn-danger">Empty Cart</a>
                    {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-primary">Purchase</button>
                </div>
            </form>
        </div>
    </div>
    <!--End of Total-->

    
    <!--IF NO CART ITEMS-->
    <div class="alert alert-danger {{ Cart::count() ?  'hidden' : '' }}">
       <span class="emptyCart">You have an empty cart.</span>
    </div>
    <!--END IF NO CART ITEMS-->

</div>
@include('welcome.topProducts')
@include('layouts.contact')
@endsection
