@extends('admin.layouts.master')

@section('title')
Admin Products
@endsection
@section('content')
<div id="admProduct" class="container-fluid">
    <h1>Admin Product</h1>
    <hr>
   <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Category</td>
                        <td>Product Name</td>
                        <td>Price</td>
                        <td>Order</td>
                        <td>Top Product</td>
                        <td>Rating</td>
                        <td>Edit</td>
                        <td>Remove</td>
                    </tr>
                </thead>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->order }}</td>
                            @if($product->isTopProduct)
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            @else
                        <td><i class="fa fa-times" aria-hidden="true"></i></td>
                            @endif
                        <td>{{ $product->rating }}</td>
                        <td><a class="btn btn-default" href="/admpro/{{ $product->id }}/edit">Edit</a></td>
                        <td><a class="btn btn-default btn-danger" href="/admpro/{{ $product->id }}/remove">Remove</a></td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-default btn-main" href="/admpro/create">ADD</a>

        </div>
   </div>

</div>

@endsection
