@extends('template')

@section('main')
	<div id="instansi" class="panel panel-default">
		<div class="panel-heading"><b><h4>Ubah Instansi</h4></b></div>
		<div class="panel-body">
		{!! Form::model($instansi, ['method' => 'PATCH', 'action' => ['InstansiController@update', $instansi->id]]) !!}
		@include('instansi.form', ['submitButtonText' => 'Update Instansi'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop