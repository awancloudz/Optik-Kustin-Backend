@extends('template')

@section('main')
	<div id="customer" class="panel panel-default">
		<div class="panel-heading"><b><h4>Tambah Customer</h4></b></div>
		<div class="panel-body">
		{!! Form::open(['url' => 'customer']) !!}
		@include('customer.form', ['submitButtonText' => 'Tambah Customer'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop