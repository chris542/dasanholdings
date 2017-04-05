@extends('layouts.master')

@section('title')
Dasan Login
@endsection

@section('content')

<div id="login" class="container">
          <div class="col-sm-offset-3 col-sm-9">
              <h1>Login</h1>
          </div>
           <form method="post" action="/login" class="form-horizontal login-form">
               {{ csrf_field() }}
               <div class="form-group">
                   <label class="col-sm-3 control-label" for="email">Email :</label>
                    <div class="col-sm-6">
                       <input class="form-control" type="text" name="email">
                    </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-3 control-label" for="password">Password :</label>
                    <div class="col-sm-6">
                       <input class="form-control" type="password" name="password">
                    </div>
               </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                    @include('layouts.errors')
                    </div>
                </div>   
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <button type="submit" class="btn btn-default btn-primary">Login</button>
                    </div>
                </div>
           </form>
</div>
@endsection
