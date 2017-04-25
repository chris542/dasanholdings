@extends('layouts.master')

@section('title')
{{ $user->first_name.' '.$user->last_name }} Details
@endsection
@section('content')
<div id="userDetails" class="container">
    <div class="row">
        <div class="col-sm-3 name">
            <h2>{{ $user->first_name.' '.$user->last_name }}</h2>
        </div>
    </div>
    <hr>
    <div class="details">
        <div class="row">
            <div class="col-sm-2 description">
                <span>Email</span>
            </div>
            <div class="col-sm-10 data">
                <span> {{ $user->email }} </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 description">
                <span>Address</span>
            </div>
            <div class="col-sm-10 data">
                <span> {{ $user->address }} </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 description">
                <span>Phone</span>
            </div>
            <div class="col-sm-10 data">
                <span> {{ $user->phone }} </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 description">
                <span>Mobile</span>
            </div>
            <div class="col-sm-10 data">
                <span> {{ $user->mobile }} </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 description">
                <span>Subscribed</span>
            </div>
            <div class="col-sm-10 data">
                @if($user->isSubscribed)
                <span>Yes</span>
                @else
                <span>No</span>
                @endif
            </div>
        </div>
        <div class="row buttons">
            <div class="col-sm-2 description">
                <a class="btn btn-default btn-primary" href="/user/{{ $user->id }}/edit">Edit Details</a>
            </div>
            <div class="col-sm-10">
                <a class="btn btn-default" href="/user/{{ $user->id }}/editPassword">Reset Password</a>
            </div>
        </div>
    </div>
</div>
@endsection
