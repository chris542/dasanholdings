@extends('admin.layouts.master')

@section('title')
Admin Comments
@endsection
@section('content')
<div id="admComment" class="container-fluid">
    <h1>Admin Comment</h1>
    <hr>
    <table class="table table-hover table-responsive table-condensed">
        <thead>
            <tr>
                <td class="product">Product</td>
                <td>User</td>
                <td class="body">Comment</td>
                <td>Rating</td>
                <td class="hidden-xs">Created</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->product->name }}</td>
                <td>{{ $comment->user->first_name ."  ". $comment->user->last_name }}</td>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->rating }}</td>
                <td class="hidden-xs">{{ $comment->created_at->diffForHumans() }}</td>
                <td><a class="btn btn-default btn-danger" href="/comment/{{ $comment->id }}/remove"><i class="fa fa-times"></i></a></td>
            </tr>
            @endforeach
        </tbody>


    </table>
</div>
@endsection
