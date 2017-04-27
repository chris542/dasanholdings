@extends('layouts.master')

@section('title')
Password Reset
@endsection
@section('content')
<div id="passwordReset" class="container">
        <form method="post" action="/user/resetPassword/{{ $user->id }}" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Old Passworld : </label>
                <div class="col-sm-6">
                  <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="newPassword" class="col-sm-3 control-label">Password : </label>
                <div class="col-sm-6">
                  <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
            </div>
            <div class="form-group">
                <label for="newPassword_confirmation" class="col-sm-3 control-label">Password Confirmation:</label>
                <div class="col-sm-6">
                  <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                @include('layouts.errors')
                </div>
            </div>   

            <div class="form-group buttons">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-default btn-primary">Edit Password</button>
                    <a class="btn btn-default btn-danger" href="/user/{{ auth()->user()->id }}">Cancel</a>
                </div>
            </div>
           
        </form>
</div>
@endsection
