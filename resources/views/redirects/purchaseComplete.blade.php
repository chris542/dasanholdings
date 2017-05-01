@extends('layouts.master')

@section('title')
Welcome to Dasan Holdings {{$user->first_name}}
@endsection
@section('content')
<div id="redirectPages" class="container">
   <h2>Thanks for purchasing our products {{$user->first_name}}</h2>
    <hr>
    <p>Great! We have successfully sent you an invoice to your email. Please check your email and complete your payment within 3 days. If you would like to change or cancel transaction, please give contact us via contact form on our website, or call us at 021 154 3033. </p>
    <p>Please click on the button below to continue shopping :)</p>
    <div class="redirectBox">
        <a class="btn btn-default btn-main" href="/">Go Home</a>
    </div>
</div>
@endsection

