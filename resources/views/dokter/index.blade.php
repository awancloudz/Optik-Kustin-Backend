@extends('template')

@section('main')
<div id="dokter" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Dokter</h4></b></div>
	<div class="panel-body">
	@include('_partial.flash_message')
	@include('dokter.form_pencarian')
	<div class="tombol-nav">
		<a href="dokter/create" class="btn btn-primary">Tambah Dokter</a>
	</div>
	@if (count($dokter_list) > 0)
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No.Telp</th>
				<th>Resep</th>
				<th>Keterangan</th>
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
			<?php foreach($dokter_list as $dokter): ?>
			@if ($dokter->nama_dokter != '-')
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $dokter->nama_dokter }}</td>
				<td>{{ $dokter->alamat }}</td>
				<td>{{ $dokter->notelp }}</td>
				<td>{{ rupiah($dokter->resep) }}</td>
				<td>{{ $dokter->keterangan }}</td>
				<td>
					<div class="box-button">
					{{ link_to('dokter/' . $dokter->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['DokterController@destroy',$dokter->id]]) !!}
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
	<p>Tidak ada data dokter.</p>
	@endif
	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Jumlah Dokter : {{ $jumlah_dokter}}</strong>
	</div>
	<div class="paging">
	{{ $dokter_list->links() }}
	</div>
	</div>

	</div>
</div>
@stop

@section('footer')
	@include('footer')
@stop