@extends('template')

@section('main')
	<div id="distributor" class="panel panel-default">
		<div class="panel-heading"><b><h4>Ubah Distributor</h4></b></div>
		<div class="panel-body">
		{!! Form::model($distributor, ['method' => 'PATCH', 'action' => ['DistributorController@update', $distributor->id]]) !!}
		@include('distributor.form', ['submitButtonText' => 'Update Distributor'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop