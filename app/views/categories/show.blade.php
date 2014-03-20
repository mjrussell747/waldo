@extends('layout')

@section('content')
<h1>Showing {{ $category->category }}</h1>
<div class="jumbotron text-center">
	<h2>{{ $category->category }}</h2>
	<p>
		<strong>Description:</strong> {{ $category->description }}<br>
	</p>
</div>
@stop
