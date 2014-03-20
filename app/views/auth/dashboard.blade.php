@extends('layout')

@section('content')
<div class="container">
	<h1>User Profile</h1>
    <div class="jumbotron">
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Created On: {{ $user->created_at }}</p>
    </div>
</div>
@stop