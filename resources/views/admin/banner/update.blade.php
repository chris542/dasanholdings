@extends('admin.layouts.master')

@section('title')
Admin Banner
@endsection

@section('content')
<div class="container-fluid">
    <h1>Banner Edit</h1>
    @foreach($banners as $banner)
<li>{{$banner->id}}</li>
<li>{{$banner->title}}</li>
@endforeach
</div>
@endsection
