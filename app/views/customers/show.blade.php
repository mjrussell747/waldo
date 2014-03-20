@extends('layout')

@section('content')
<h1>Showing {{ $customer->company }}</h1>
<div class="jumbotron text-center">
	<h2>{{ $customer->company }}</h2>
	<p>
		<strong>Contact Name:</strong> {{ $customer->first_name . ' ' . $customer->last_name }}<br>
		<strong>Address:</strong><br>
		{{ $customer->address_1 }}<br>
		@if ($customer->address_2 != '')
		{{ $customer->address_2 }}<br>
		@endif
		{{ $customer->city }}, {{ $customer->state }}, {{ $customer->postal_code }}<br>
		{{ $customer->country }}<br>
		<strong>Sales Rep:</strong> {{ $customer->employee->first_name . ' ' . $customer->employee->last_name }}<br>
		<strong>Credit Limit:</strong> {{ $customer->credit_limit }}<br>
	</p>
</div>

<h2>Orders</h2>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Order Date</td>
			<td>Status</td>
			<td>Required Date</td>
			<td>Comments</td>
			<td>Shipped Date</td>
                        <td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($orders as $order)
		<tr>
			<td>{{ $order->id }}</td>
			<td style="white-space: nowrap">{{ $order->order_date }}</td>
			<td>{{ $order->status }}</td>
                        <td style="white-space: nowrap">{{ $order->required_date }}</td>
                        <td>{{ $order->comments }}</td>
                        <td style="white-space: nowrap">{{ $order->shipped_date }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- show the order (uses the show method found at GET /orders/{id} -->
				<a class="btn btn-sm btn-success pull-right" href="{{ URL::to('orders/' . $order->id) }}">Show this Order</a>
				@if(Auth::check())
				<!-- edit this customer (uses the edit method found at GET /customers/{id}/edit -->
				<a class="btn btn-sm btn-info pull-right" href="{{ URL::to('orders/' . $order->id . '/edit') }}">Edit this Order</a>
                                
				<!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
				{{ Form::open(array('url' => 'orders/' . $order->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Order', array('class' => 'btn btn-sm btn-warning')) }}
				{{ Form::close() }}
				@endif

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

@stop
