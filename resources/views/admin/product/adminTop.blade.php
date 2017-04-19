@extends('admin.layouts.master')

@section('title')
Admin Top Products
@endsection
@section('content')
<div id="admTop" class="container-fluid">
    <h1>Admin Top Products</h1>
    <hr>
    <table class="table-condensed table table-responsive">
        <thead>
            <tr>
                <td>Category</td>
                <td>Product Name</td>
                <td>Price</td>
                <td>Top Order</td>
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
                <td class="col-xs-1">${{ $product->price }}</td>
                <td class="col-xs-1">{{ $product->tpOrder }}</td>
                    @if($product->isTopProduct)
                <td class="col-xs-1"><i class="fa fa-check" aria-hidden="true"></i></td>
                    @else
                <td class="col-xs-1"><i class="fa fa-times" aria-hidden="true"></i></td>
                    @endif
                <td class="col-xs-1"><img style="max-width: 30px" class="img-responsive" src="{{ asset('/storage/products') }}/{{ $product->img }}" alt=""></td>
                <td class="col-xs-1">{{ $product->rating }}</td>
                <td class="col-xs-1"><a class="btn btn-default" href="/admtp/{{ $product->id }}/edit">Edit</a></td>
                <td class="col-xs-1"><a class="btn btn-default btn-danger" href="/admtp/{{ $product->id }}/remove">Remove</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
