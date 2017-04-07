@extends('layouts.master')

@section('title')
Registration
@endsection

@section('content')
<div class="container" id="registration"> <h1>Register</h1>
        <p>Please fill in all request form</p>
        <form method="post" action="/register" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">First Name:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                  <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-10">
                  <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">Password Confirmation:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Address:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="address" name="address" cols="30" rows="5" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile" class="col-sm-2 control-label">Mobile:</label>
                <div class="col-sm-4">
                  <input type="tel" pattern=".{7,}" title="minimum 7numbers" class="form-control" id="mobile" name="mobile" required>
                </div>
                <label for="phone" class="col-sm-2 control-label">Phone:</label>
                <div class="col-sm-4">
                  <input type="tel" pattern=".{7,}" title="minimum 7 numbers" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <label for="isSubscribed">
                    <input type="hidden" value="0" name="isSubscribed">
                    <input type="checkbox" value="1" name="isSubscribed">
                    Subscribe to Newsletter
                  </label>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default btn-primary">Register</button>
                </div>
            </div>
        </form>
</div>
@endsection
