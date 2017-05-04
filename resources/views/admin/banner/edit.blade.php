@extends('admin.layouts.master')

@section('title')
Banner {{ $banner->title }} Edit
@endsection

@section('content')
<div id="editBanner" class="container-fluid">
<h1>Banner {{ $banner->title }} Edit</h1>
    <form method="post" enctype="multipart/form-data" action="/admbanner/{{ $banner->id }}" class="form-horizontal">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
       <div class="form-group">
           <label class="col-sm-2 control-label" for="title">Title</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" maxlength=50 name="title" placeholder="{{ $banner->title }}" value="{{ $banner->title }}">
           </div>
       </div> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description</label>
            <div class="col-sm-10">
               <textarea class="form-control" name="description" cols="30" rows="10" placeholder="{{ $banner->description }} ">{{ $banner->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="bgImg">Background Image</label>
            <div class="col-sm-10">
                <img class="img-responsive" src="{{asset('storage/banners')}}/{{ $banner->bgImg }}" alt="">
                <input type="file" name="bgImg">
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
                <a class="btn btn-default btn-main" href="/admbanner">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
