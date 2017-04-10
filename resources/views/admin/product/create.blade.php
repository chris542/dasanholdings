@extends('admin.layouts.master')

@section('title')
Create Product
@endsection
@section('content')
<div id="addProduct" class="container-fluid">
    <h1>Add Product</h1>
    <hr>
    <form method="post" enctype="multipart/form-data" action="/admpro" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name">Name : </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="category_id">Category : </label>
            <div class="col-sm-10">
                <select class="form-control" type="text" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                 </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description : </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="price">Price : </label>
            <div class="col-sm-10">
                <input class="form-control" type="number" step="any" min="0" name="price" placeholder="0.00">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="isTopProduct">Top Product : </label>
            <div class="col-sm-10">
                <input type="hidden" value="0" name="isTopProduct">
                <input type="checkbox" value="1" name="isTopProduct"> Check to put on the main page. 
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="img">Image : </label>
            <div class="col-sm-10">
                <input  type="file" name="img">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @include('layouts.errors')
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default btn-primary">Create</button>
                <a class="btn btn-default btn-main" href="/admpro">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
