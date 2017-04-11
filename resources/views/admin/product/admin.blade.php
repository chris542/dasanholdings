@extends('admin.layouts.master')

@section('title')
Admin Products
@endsection
@section('content')
<div id="admProduct" class="container-fluid">
    <h1>Admin Product</h1>
    <hr>
    <table class="table table-hover table-responsive table-condensed">
        <thead>
            <tr>
                <td>Category</td>
                <td>Product Name</td>
                <td>Price</td>
                <td>Order</td>
                <td>Top Product</td>
                <td>Image</td>
                <td>Rating</td>
                <td>Edit</td>
                <td>Remove</td>
            </tr>
        </thead>
        @foreach($products as $product)
            <tr>
                <td class="col-xs-2">{{ $product->category->name }}</td>
                <td class="col-xs-2">{{ $product->name }}</td>
                <td class="col-xs-1">{{ $product->price }}</td>
                <td class="col-xs-1">{{ $product->order }}</td>
                    @if($product->isTopProduct)
                <td class="col-xs-1"><i class="fa fa-check" aria-hidden="true"></i></td>
                    @else
                <td class="col-xs-1"><i class="fa fa-times" aria-hidden="true"></i></td>
                    @endif
                <td class="col-xs-1"><img style="max-width: 30px" class="img-responsive" src="{{ asset('/storage/products') }}/{{ $product->img }}" alt=""></td>
                <td class="col-xs-1">{{ $product->rating }}</td>
                <td class="col-xs-1"><a class="btn btn-default" href="/admpro/{{ $product->id }}/edit">Edit</a></td>
                <td class="col-xs-1"><a class="btn btn-default btn-danger" href="/admpro/{{ $product->id }}/remove">Remove</a></td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-default btn-main" href="/admpro/create">ADD</a>
</div>

@endsection
