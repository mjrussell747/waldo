@extends('layout')

@section('content')
<h1>Edit {{ $category->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('category', 'Category') }}
		{{ Form::text('category', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Update Category', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
