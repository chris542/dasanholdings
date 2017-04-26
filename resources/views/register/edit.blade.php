@extends('layouts.master')

@section('title')
{{ $user->first_name.' '.$user->last_name }} Edit
@endsection
@section('content')
<div id="userEdit" class="container">
        <div class="row">
            <div class="col-sm-3 name">
                <h2>Editing Details</h2>
            </div>
        </div>
        <hr>
        <form method="post" action="/user/{{ $user->id }}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 control-label" for="first_name">First Name : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="first_name" placeholder="{{$user->first_name}}" value="{{$user->first_name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="last_name">Last Name : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="last_name" placeholder="{{$user->last_name}}" value="{{$user->last_name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="address">Address : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" minlength=5 name="address" placeholder="{{ $user->address }}" value="{{ $user->address }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="phone">Phone : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="tel" pattern=".{7,}" title="minimum 7 numbers" name="phone" placeholder="{{$user->phone}}" value="{{$user->phone}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="mobile">Mobile : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="tel" pattern=".{7,}" title="minimum 7 numbers" name="mobile" placeholder="{{$user->mobile}}" value="{{$user->mobile}}" required>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <label for="isSubscribed">
                        <input type="hidden" value="0" name="isSubscribed">
                        @if($user->isSubscribed)
                            <input type="checkbox" value="1" name="isSubscribed" checked>
                        @else
                            <input type="checkbox" value="1" name="isSubscribed">
                        @endif
                    Subscribe to Newsletter
                  </label>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="form-group buttons">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default btn-primary">Edit</button>
                    <a class="btn btn-default btn-danger" href="/user/{{ $user->id }}">Cancel</a>
                </div>
            </div>
        </form>
</div>
@endsection
