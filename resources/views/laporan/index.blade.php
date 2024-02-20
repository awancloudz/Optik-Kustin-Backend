@extends('template')

@section('main')
<div id="transaksi" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Transaksi</h4></b></div>
	<div class="panel-body">
	@include('_partial.flash_message')
	<!-- Tampil Transaksi -->
	@if (count($transaksi_list) > 0)
	<div class="row" align="center">
		<b>
  		<div class="col-md-2">
  		Tanggal Awal
  		</div>
  		<div class="col-md-2">
  		Tanggal Akhir
  		</div>
  		<div class="col-md-3">
  		Total Penjualan
  		</div>
  		<div class="col-md-2">
  		Total Pembayaran
  		</div>
  		<div class="col-md-2">
  		Sisa Kekurangan
  		</div>
  		</b>
  	</div><hr>
  	<?php
  	function rupiah($nilai, $pecahan = 0) {
	return "Rp. " . number_format($nilai, $pecahan, ',', '.');
	}
  	$totaljual = 0;
  	$totalbayar = 0;
  	$totalsisa = 0;
  	?>
  	@foreach($transaksi_list as $transaksihitung)
  	<?php
  		$totaljual = $totaljual + $transaksihitung->totalbelanja;
  		$totalbayar = $totalbayar + $transaksihitung->bayar;
  		$totalsisa = $totalsisa + $transaksihitung->sisa;
  	?>
  	@endforeach
  	<div class="row" align="center">
  		<div class="col-md-2">
  		{!! Form::date('tanggalawal', null,['class' => 'form-control']) !!}
  		</div>
  		<div class="col-md-2">
  		{!! Form::date('tanggalakhir', null,['class' => 'form-control']) !!}
  		</div>
  		<div class="col-md-3">
  		{{ rupiah($totaljual) }}
  		</div>
  		<div class="col-md-2">
  		{{ rupiah($totalbayar) }}
  		</div>
  		<div class="col-md-2">
  		{{ rupiah($totalsisa) }}
  		</div>
  	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Kode Transaksi</th>
				<th>Nama Customer</th>
				<th>Tanggal Pesan</th>
				<th>Tanggal Selesai</th>
				<th>Total Belanja</th>
				<th>Asuransi</th>
				<th>Diskon</th>
				<th>Sub Total</th>
				<th>Bayar</th>
				<th>Sisa</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; ?>
			<?php foreach($transaksi_list as $transaksi): ?>
			<tr>
				<td>{{ $transaksi->kodetransaksi }}</td>
				<td>{{ $transaksi->customer->nama }}</td>
				<td>{{ $transaksi->tanggaltransaksi }}</td>
				<td>{{ $transaksi->tanggalselesai }}</td>
				<td>{{ rupiah($transaksi->totalbelanja) }}</td>
				<td>{{ rupiah($transaksi->asuransi) }}</td>
				<td>{{ rupiah($transaksi->totaldiskon) }}</td>
				<td>{{ rupiah($transaksi->total) }}</td>
				<td>{{ rupiah($transaksi->bayar) }}</td>
				<td>{{ rupiah($transaksi->sisa) }}</td>
				<td>
					<div class="box-button"> 
					{{ link_to('transaksi/print/' . $transaksi->id,'Cetak',['class' => 'btn btn-primary btn-sm','target'=>'_blank']) }}</div>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	@else
	<p>Tidak ada data transaksi.</p>
	@endif
	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Jumlah Transaksi : {{ $jumlah_transaksi}}</strong>
	</div>
	<div class="paging">
	{{ $transaksi_list->links() }}
	</div>
	</div>
	<!--Akhir Tampil Transaksi -->
	</div>
</div>
@stop

@section('footer')
	@include('footer')
@stop