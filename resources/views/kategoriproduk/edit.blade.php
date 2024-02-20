@extends('template')

@section('main')
	<div id="kategoriproduk" class="panel panel-default">
		<div class="panel-heading"><b><h4>Ubah Kategori Produk</h4></b></div>
		<div class="panel-body">
		{!! Form::model($kategoriproduk,['method' => 'PATCH', 'action' => ['KategoriprodukController@update',$kategoriproduk->id]]) !!}
		@include('kategoriproduk.form',['submitButtonText' => 'Update Kategori Produk'])
		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop