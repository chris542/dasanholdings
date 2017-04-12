@extends('admin.layouts.master')

@section('title')
Create Category
@endsection
@section('content')
<div id="addCategory" class="container-fluid">
    <h1>Adding Categories</h1>
    <hr>
    <form method="post" action="/admcat" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name">Name : </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description : </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" cols="30" rows="10" required></textarea>
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
                <a class="btn btn-default btn-main" href="/admcat">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
