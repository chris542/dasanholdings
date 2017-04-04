@extends('layouts.master')

@section('title')
Dasan Holdings Ltd.
@endsection

@section('content')

@include('welcome/bannerCarousel')
@include('welcome/topProducts')
@include('welcome/services')
@include('layouts.subscribe')
@include('layouts.contact')

@endsection
