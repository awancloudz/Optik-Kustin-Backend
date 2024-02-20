@extends('template')

@section('main')
<div id="instansi" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Instansi</h4></b></div>
	<div class="panel-body">
	@include('_partial.flash_message')
	@include('instansi.form_pencarian')
	<div class="tombol-nav">
		<a href="instansi/create" class="btn btn-primary">Tambah Instansi</a>
	</div>
	@if (count($instansi_list) > 0)
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No.Telp</th>
				<th>Keterangan</th>
				<th>Harga</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; ?>
			<?php 
			function rupiah($nilai, $pecahan = 0) {
			return "Rp. " . number_format($nilai, $pecahan, ',', '.');
			} 
			?>
			<?php foreach($instansi_list as $instansi): ?>
			@if ($instansi->nama_instansi != '-')
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $instansi->nama_instansi }}</td>
				<td>{{ $instansi->alamat }}</td>
				<td>{{ $instansi->notelp }}</td>
				<td>{{ $instansi->keterangan }}</td>
				<td>{{ rupiah($instansi->harga) }}</td>
				<td>
					<div class="box-button">
					{{ link_to('instansi/' . $instansi->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['InstansiController@destroy',$instansi->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!! Form::close()!!}
					</div>
				</td>
			</tr>
			@endif
		<?php endforeach ?>
		</tbody>
	</table>
	@else
	<p>Tidak ada data instansi.</p>
	@endif
	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Jumlah Instansi : {{ $jumlah_instansi}}</strong>
	</div>
	<div class="paging">
	{{ $instansi_list->links() }}
	</div>
	</div>

	</div>
</div>
@stop

@section('footer')
	@include('footer')
@stop