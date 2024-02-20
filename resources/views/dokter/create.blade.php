@extends('template')

@section('main')
	<div id="dokter" class="panel panel-default">
		<div class="panel-heading"><b><h4>Tambah Dokter</h4></b></div>
		<div class="panel-body">
		{!! Form::open(['url' => 'dokter']) !!}
		@include('dokter.form', ['submitButtonText' => 'Tambah Dokter'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop