@extends('template')

@section('main')
<div id="kategoriproduk" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Kategori Produk</h4></b></div>
	<div class="panel-body">
	@include('_partial.flash_message')
	@include('kategoriproduk.form_pencarian')
	<div class="tombol-nav">
		<a href="kategoriproduk/create" class="btn btn-primary">Tambah Kategori Produk</a>
	</div>
	@if (count($kategoriproduk_list) > 0)
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Keterangan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; ?>
			<?php foreach($kategoriproduk_list as $kategoriproduk): ?>
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $kategoriproduk->nama }}</td>
				<td>{{ $kategoriproduk->keterangan }}</td>
				<td>
					<div class="box-button">
					{{ link_to('kategoriproduk/' . $kategoriproduk->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['KategoriprodukController@destroy',$kategoriproduk->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!! Form::close()!!}
					</div>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	@else
	<p>Tidak ada data kategori produk.</p>
	@endif
	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Jumlah Kategori Produk : {{ $jumlah_kategoriproduk}}</strong>
	</div>
	<div class="paging">
	{{ $kategoriproduk_list->links() }}
	</div>
	</div>

	</div>
</div>
@stop

@section('footer')
	@include('footer')
@stop