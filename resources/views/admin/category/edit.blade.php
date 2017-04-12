@extends('admin.layouts.master')

@section('title')
Edit Category
@endsection
@section('content')
<div id="editCategory" class="container-fluid">
<h1>Edit Category</h1>
    <form method="post" action="/admcat/{{ $category->id }}" class="form-horizontal">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name">Name : </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name" placeholder="{{ $category->name }}" value="{{ $category->name }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description : </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" cols="30" rows="10" placeholder="{{ $category->description }}">{{ $category->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="order">Order : </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="order" placeholder="{{ $category->order }}" value="{{ $category->order }}">
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
                <a class="btn btn-default btn-main" href="/admcat">Cancel</a>
            </div>
        </div>
    </form>

</div>

@endsection
