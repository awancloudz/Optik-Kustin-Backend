@extends('template')

@section('main')
	<div id="kategoriproduk" class="panel panel-default">
		<div class="panel-heading"><b><h4>Tambah Kategori Produk</h4></b></div>
		<div class="panel-body">
		{!! Form::open(['url' => 'kategoriproduk']) !!}
		@include('kategoriproduk.form', ['submitButtonText' => 'Tambah Kategori Produk'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop