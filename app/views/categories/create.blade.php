@extends('layout')

@section('content')
<h1>New Category</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'categories')) }}

	<div class="form-group">
		{{ Form::label('category', 'Category') }}
		{{ Form::text('category', Input::old('category'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create New Category', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
