@extends('template')

@section('main')
	<div id="customer" class="panel panel-default">
		<div class="panel-heading"><b><h4>Ubah Customer</h4></b></div>
		<div class="panel-body">
		{!! Form::model($customer, ['method' => 'PATCH', 'action' => ['CustomerController@update', $customer->id]]) !!}
		@include('customer.form', ['submitButtonText' => 'Update Customer'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop