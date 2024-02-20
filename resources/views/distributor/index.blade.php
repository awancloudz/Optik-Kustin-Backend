@extends('template')

@section('main')
<div id="distributor" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Distributor</h4></b></div>
	<div class="panel-body">
	@include('_partial.flash_message')
	@include('distributor.form_pencarian')
	<div class="tombol-nav">
		<a href="distributor/create" class="btn btn-primary">Tambah Distributor</a>
	</div>
	@if (count($distributor_list) > 0)
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No.Telp</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; ?>
			<?php foreach($distributor_list as $distributor): ?>
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $distributor->nama_distributor }}</td>
				<td>{{ $distributor->alamat }}</td>
				<td>{{ $distributor->notelp }}</td>
				<td>
					<div class="box-button">
					{{ link_to('distributor/' . $distributor->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['DistributorController@destroy',$distributor->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!! Form::close()!!}
					</div>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	@else
	<p>Tidak ada data distributor.</p>
	@endif
	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Jumlah Distributor : {{ $jumlah_distributor}}</strong>
	</div>
	<div class="paging">
	{{ $distributor_list->links() }}
	</div>
	</div>

	</div>
</div>
@stop

@section('footer')
	@include('footer')
@stop