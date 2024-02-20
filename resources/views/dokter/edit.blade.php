@extends('template')

@section('main')
	<div id="dokter" class="panel panel-default">
		<div class="panel-heading"><b><h4>Ubah Dokter</h4></b></div>
		<div class="panel-body">
		{!! Form::model($dokter, ['method' => 'PATCH', 'action' => ['DokterController@update', $dokter->id]]) !!}
		@include('dokter.form', ['submitButtonText' => 'Update Dokter'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop