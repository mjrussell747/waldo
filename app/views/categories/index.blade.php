@extends('layout')

@section('content')
<h1>Categories</h1>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Category</td>
			<td>Description</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($categories as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->category }}</td>
			<td>{{ $value->description }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- show the category (uses the show method found at GET /categories/{id} -->
				<a class="btn btn-sm btn-success pull-right" href="{{ URL::to('categories/' . $value->id) }}">Show this Category</a>
				
				@if(Auth::check())
				<!-- edit this category (uses the edit method found at GET /categories/{id}/edit -->
				<a class="btn btn-sm btn-info pull-right" href="{{ URL::to('categories/' . $value->id . '/edit') }}">Edit this Category</a>
				
				<!-- delete the category (uses the destroy method DESTROY /categories/{id} -->
				{{ Form::open(array('url' => 'categories/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Category', array('class' => 'btn btn-sm btn-warning')) }}
				{{ Form::close() }}
				@endif

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
