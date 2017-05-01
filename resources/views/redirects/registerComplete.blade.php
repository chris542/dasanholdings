@extends('layouts.master')

@section('title')
Welcome to Dasan Holdings {{$user->first_name}}
@endsection
@section('content')
<div id="redirectPages" class="container">
   <h2>Thanks for registering {{$user->first_name}}</h2>
    <hr>
    <p>Welcome to Dasan Holdings. You are not logged in as {{$user->first_name}} {{$user->last_name}}. Please click on the button below to continue shopping :)</p>
    <div class="redirectBox">
        <a class="btn btn-default btn-main" href="/">Go Home</a>
    </div>
</div>
@endsection
