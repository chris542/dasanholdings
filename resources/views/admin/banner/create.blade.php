@extends('admin.layouts.master')

@section('title')
Banner Add
@endsection

@section('content')
<div id="addBanner" class="container-fluid">
    <h1>Adding Banners</h1>
    <form method="post" enctype="multipart/form-data" action="/admbanner" class="form-horizontal">
        {{ csrf_field() }}
       <div class="form-group">
           <label class="col-sm-2 control-label" for="title">Title</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" name="title" placeholder="Maximum 30 letters" required>
           </div>
       </div> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description</label>
            <div class="col-sm-10">
               <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Maximum 50 letters" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="bgImg">Background Image</label>
            <div class="col-sm-10">
                <input type="file" name="bgImg" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @include('layouts.errors')
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default btn-primary">Add</button>
                <a class="btn btn-default btn-main" href="/admbanner">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

