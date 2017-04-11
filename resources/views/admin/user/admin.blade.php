@extends('admin.layouts.master')

@section('title')
Admin Users
@endsection
@section('content')
<div id="admusers" class="container-fluid">
    <h1>Admin User</h1>
    <hr>
    <table class="table table-condensed table-responsive">
        <thead>
            <tr>
                <td>id</td>
                <td>Full Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>Subscribed</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->email }}</td>
                @if($user->isSubscribed)
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif
                <td><a href="/admusers/{{ $user->id }}/remove">Delete</a></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection
