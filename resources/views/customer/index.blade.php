@extends('template')

@section('main')
<div id="customer" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Customer</h4></b></div>
	<div class="panel-body">
	@include('_partial.flash_message')
	@include('customer.form_pencarian')
	<div class="tombol-nav">
		<a href="customer/create" class="btn btn-primary">Tambah Customer</a>
	</div>
	@if (count($customer_list) > 0)
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
			<?php foreach($customer_list as $customer): ?>
			@if ($customer->nama != '-')
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $customer->nama }}</td>
				<td>{{ $customer->alamat }}</td>
				<td>{{ $customer->notelp }}</td>
				<td>
					<div class="box-button"> 
					{{ link_to('customer/' . $customer->id,'Detail',['class' => 'btn btn-success btn-sm']) }}</div>
					<div class="box-button">
					{{ link_to('customer/' . $customer->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['CustomerController@destroy',$customer->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!! Form::close()!!}
					</div>
					<div class="box-button"> 
					{{ link_to('customer/print/' . $customer->id,'Cetak Resep',['class' => 'btn btn-primary btn-sm','target'=>'_blank']) }}</div>
				</td>
			</tr>
			@endif
		<?php endforeach ?>
		</tbody>
	</table>
	@else
	<p>Tidak ada data customer.</p>
	@endif
	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Jumlah Customer : {{ $jumlah_customer}}</strong>
	</div>
	<div class="paging">
	{{ $customer_list->links() }}
	</div>
	</div>

	</div>
</div>
@stop

@section('footer')
	@include('footer')
@stop