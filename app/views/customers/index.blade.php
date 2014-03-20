@extends('layout')

@section('content')
<h1>Customers</h1>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Company</td>
			<td>Last Name</td>
			<td>First Name</td>
			<td>Phone</td>
			<td>Address 1</td>
			<td>Address 2</td>
			<td>City</td>
			<td>State</td>
			<td>Postal Code</td>
			<td>Country</td>
			<td>Sales Rep</td>
			<td>Credit Limit</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($customers as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->company }}</td>
			<td>{{ $value->last_name }}</td>
                        <td>{{ $value->first_name }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address_1 }}</td>
                        <td>{{ $value->address_2 }}</td>
                        <td>{{ $value->city }}</td>
                        <td>{{ $value->state }}</td>
                        <td>{{ $value->postal_code }}</td>
                        <td>{{ $value->country }}</td>
                        <td>{{ $employees[$value->employee_id] }}</td>
                        <td>{{ $value->credit_limit }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- show the customer (uses the show method found at GET /customers/{id} -->
				<a class="btn btn-sm btn-success pull-right" href="{{ URL::to('customers/' . $value->id) }}">Show this Customer</a>

				@if(Auth::check())
				<!-- edit this customer (uses the edit method found at GET /customers/{id}/edit -->
				<a class="btn btn-sm btn-info pull-right" href="{{ URL::to('customers/' . $value->id . '/edit') }}">Edit this Customer</a>

				<!-- delete the customer (uses the destroy method DESTROY /customers/{id} -->
				{{ Form::open(array('url' => 'customers/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Customer', array('class' => 'btn btn-sm btn-warning')) }}
				{{ Form::close() }}
				@endif

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

<p>{{ $customers->links() }}</p>
@stop
