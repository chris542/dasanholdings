@extends('admin.layouts.master')

@section('title')
Admin Banner
@endsection

@section('content')
<div id="adminBanner" class="container-fluid">
    <h1>Admin Banners</h1>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>Title</td>
                <td>Description</td>
                <td>Image</td>
                <td>Created</td>
                <td>Updated</td>
                <td>EDIT</td>
                <td>DELETE</td>
            </tr>
        </thead>
        <tbody>
        @foreach($banners as $banner)
            <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->title}}</td>
                <td>{{$banner->description}}</td>
                <td>{{$banner->bgImg}}</td>
                <td>{{$banner->created_at->toDateString()}}</td>
                <td>{{$banner->updated_at->toDateString()}}</td>
                <td><a class="btn btn-default btn-primary" href="/admbanner/{{ $banner->id }}/edit">EDIT</a></td>
                <td><a class="btn btn-default btn-danger" href="/admbanner/{{ $banner->id }}">DELETE</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <a class="btn btn-default btn-main" href="/admbanner/create">ADD</a>
</div>
@endsection
