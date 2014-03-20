@extends('layout')

@section('content')
<h1>Edit {{ $customer->company }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('company', 'Company') }}
		{{ Form::text('company', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('last_name', 'Last Name') }}
		{{ Form::text('last_name', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('first_name', 'First Name') }}
		{{ Form::text('first_name', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('address_1', 'Address Line 1') }}
		{{ Form::text('address_1', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('address_2', 'Address Line 2') }}
		{{ Form::text('address_2', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('city', 'City') }}
		{{ Form::text('city', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('state', 'State') }}
		{{ Form::text('state', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('postal_code', 'Postal Code') }}
		{{ Form::text('postal_code', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('country', 'Country') }}
		{{ Form::text('country', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('employee_id', 'Sales Rep') }}
		{{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('credit_limit', 'Credit Limit') }}
		{{ Form::text('credit_limit', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Update Customer', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
