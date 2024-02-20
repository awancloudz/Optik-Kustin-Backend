@extends('template')

@section('main')
	<div id="distributor" class="panel panel-default">
		<div class="panel-heading"><b><h4>Tambah Distributor</h4></b></div>
		<div class="panel-body">
		{!! Form::open(['url' => 'distributor']) !!}
		@include('distributor.form', ['submitButtonText' => 'Tambah Distributor'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop