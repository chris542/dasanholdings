@extends('admin.layouts.master')

@section('title')
Admin Banner
@endsection

@section('content')
<div id="adminBanner" class="container-fluid">
    <h1>Admin Banners</h1>
    <hr>
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
            @foreach($banners as $key => $banner)
                @if($key == 0)
                    <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                @else
                    <li data-target="#bootstrap-touch-slider" data-slide-to="{{ $key }} "></li>
                @endif
            @endforeach
      </ol>
      <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($banners as $key => $banner)
                @if($key == 0)
                <div class="item active">
                @else
                <div class="item">
                @endif
                    <img src="{{  asset('storage/banners/') }}/{{ $banner->bgImg }}" alt="{{ $banner->bgImg }}" class="slide-image">
                    <div class="container">
                        <div class="row">
                            <div class="slide-text slide_style_left">
                                <h1>{{ $banner->title }}</h1>
                                <p>{{ $banner->description }}</p>
                                <a href="/admbanner/{{ $banner->id }}/edit " class="btn btn-default btn-primary">Edit</a>
                                <a href="/admbanner/{{ $banner->id }}" class="btn btn-default btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <hr>
    <a class="btn btn-default btn-main" href="/admbanner/create">ADD</a>

</div>
@endsection