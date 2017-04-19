@extends('layouts.master')

@section('title')
My Cart
@endsection
@section('content')
<div id="showCart" class="container">
    <h2>My Cart</h2>
    <table class="table table-responsive table-condensed">
        <thead>
            <tr>
                <td>Product</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cartProducts as $product)
            <tr>
                <td>$product->name</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
