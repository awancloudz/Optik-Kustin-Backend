@extends('template')

@section('main')
	<div id="instansi" class="panel panel-default">
		<div class="panel-heading"><b><h4>Tambah Instansi</h4></b></div>
		<div class="panel-body">
		{!! Form::open(['url' => 'instansi']) !!}
		@include('instansi.form', ['submitButtonText' => 'Tambah Instansi'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop