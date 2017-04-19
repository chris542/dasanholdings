@extends('admin.layouts.master')

@section('title')
Subscription List
@endsection
@section('content')
<div id="subscriptionList" class="container-fluid">
    <h1>Subscribed List</h1>
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
            </tr>
        </thead>
        <tbody>
            @foreach($subscribed as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>

</div>
@endsection
