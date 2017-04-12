@extends('admin.layouts.master')

@section('title')
Edit Product
@endsection
@section('content')
<div id="editProduct" class="container-fluid">
    <h1>Edit {{ $product->name }}</h1>
    <hr>
    <form method="post" enctype="multipart/form-data" action="/admpro/{{ $product->id }}" class="form-horizontal">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name">Name : </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name" placeholder="{{ $product->name }}" value="{{ $product->name }} ">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="category_id">Category : </label>
            <div class="col-sm-10">
                <select class="form-control" type="text" name="category_id">
                    @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                    <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                        @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                 </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description : </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" cols="30" rows="10" placeholder="{{ $product->description }}">{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="price">Price : </label>
            <div class="col-sm-10">
                <input class="form-control" type="number" step="any" min="0" name="price" placeholder="{{ $product->price }}" value="{{ $product->price }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="minimum">Minimum Qt : </label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="minimum" value="{{ $product->minimum }}" placeholder="{{ $product->minimum }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="isTopProduct">Top Product : </label>
            <div class="col-sm-10">
                <input type="hidden" value="0" name="isTopProduct">
                @if($product->isTopProduct == true)
                <input type="checkbox" value="1" name="isTopProduct" checked> Check to put on the main page. 
                @else
                <input type="checkbox" value="1" name="isTopProduct"> Check to put on the main page. 
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="order">Order : </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="order" placeholder="{{ $product->order }}" value="{{ $product->order }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="img">Image : </label>
            <div class="col-sm-10">
                <img class="img-responsive center-block" src="{{ asset('storage/products') }}/{{ $product->img }}" alt="{{ $product->img }}">
                <input type="file" name="img">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @include('layouts.errors')
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default btn-primary">Edit</button>
                <a class="btn btn-default btn-main" href="/admpro">Cancel</a>
            </div>
        </div>
    </form>
    
</div>

@endsection
