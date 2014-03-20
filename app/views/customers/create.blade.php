@extends('layout')

@section('content')
<h1>New Customer</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'customers')) }}

	<div class="form-group">
		{{ Form::label('company', 'Company') }}
		{{ Form::text('company', Input::old('company'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('last_name', 'Last Name') }}
		{{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('first_name', 'First Name') }}
		{{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('address_1', 'Address Line 1') }}
		{{ Form::text('address_1', Input::old('address_1'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('address_2', 'Address Line 2') }}
		{{ Form::text('address_2', Input::old('address_2'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('city', 'City') }}
		{{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('state', 'State') }}
		{{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('postal_code', 'Postal Code') }}
		{{ Form::text('postal_code', Input::old('postal_code'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('country', 'Country') }}
		{{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('employee_id', 'Sales Rep') }}
		{{ Form::select('employee_id', array('' => 'Please Select') + $employees, Input::old('employee_id'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('credit_limit', 'Credit Limit') }}
		{{ Form::text('credit_limit', Input::old('company'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create New Customer', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
