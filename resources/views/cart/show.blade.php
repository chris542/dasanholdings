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
    @if(count($cartProducts))
    <!--Table-->
    <table class="table table-responsive table-condensed table-hover">
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
                <form method="post" action="/updateQuantity" class="form-horizontal">
                    {{ csrf_field() }}
                    <td class="col-xs-1">{{ $product->name }}</td>
                    <td class="col-xs-1"><img style="max-width: 30px" class="img-responsive" src="{{ asset('/storage/products') }}/{{ $product->options->img }}" alt=""></td>

                    <td class="col-xs-1">
                        <div class="form-group">
                            <input type="hidden" name="rowID" value="{{ $product->rowId }}" required>
                            <input class="form-control" type="number" name="qt" min="{{ $product->options->minimum }}" value="{{ $product->qty }}" required>
                        </div>
                    </td>
                    <td class="col-xs-1 price">${{ $product->price }}</td>
                    <td class="col-xs-1 update">
                      <button type="submit" class="btn btn-default">Update</button>
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
    <div class="row">
        <div class="col-sm-12 summary">
           <div class="total">
               Subtotal : ${{  Cart::subtotal() }} 
           </div>
           <div class="tax">
               Tax : ${{ ( Cart::tax()) }} 
           </div>
           <div class="TOTAL">
               Total : ${{ ( Cart::total()) }} 
           </div>
        </div>
    </div>
    <!--End of Total-->

    <div class="form-group">
      <a href="/destroyCart" class="btn btn-default btn-danger">Empty Cart</a>
          <button type="submit" class="btn btn-default btn-primary">Purchase</button>
    </div>

    @else
    
    <!--IF NO CART ITEMS-->
    <div class="alert alert-danger">
       <span class="emptyCart">You have an empty cart.</span>
    </div>
    <!--END IF NO CART ITEMS-->

    @endif
</div>
@include('welcome.topProducts')
@include('layouts.contact')
@endsection
