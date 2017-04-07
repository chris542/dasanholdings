@extends('admin.layouts.master')

@section('title')
Admin Dasan Holdings Ltd.
@endsection

@section('content')
<div id="adminIndex" class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>Managing Content</h1>
            <p>This is where you can manage all the contents.</p>
            <ul class='list-group'>
                <li class='list-group-item'><a href="/admbanner">Banner</a></li>
                <li class='list-group-item'><a href="/admtp">Top Products</a></li>
                <li class='list-group-item'><a href="/admcat">Categories</a></li>
                <li class='list-group-item'><a href="/admpro">Products</a></li>
                <li class='list-group-item'><a href="/admusers">Users</a></li>
                <li class='list-group-item'><a href="/admcm">Comments</a></li>
                <li class='list-group-item'><a href="/admsub">Subscription</a></li>
                <li class='list-group-item'><a href="/">Back</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
