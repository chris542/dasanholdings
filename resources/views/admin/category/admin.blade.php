@extends('admin.layouts.master')

@section('title')
Category Admin
@endsection
@section('content')

<div id="admincategory" class="container-fluid">
    <h1>Admin Categories</h1>
    <p>You may add / edit / remove categories on this page.</p>
    <hr>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>Order</td>
                <td>Edit</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->order}}</td>
                <td><a class="btn btn-default" href="/admcat/{{ $category->id }}/edit">Edit</a></td>
                <td><a class="btn btn-default btn-danger" href="/admcat/{{ $category->id }}/remove">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-default btn-main" href="/admcat/create">ADD</a>
</div>

@endsection
