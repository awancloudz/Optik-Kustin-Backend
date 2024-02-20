@extends('template')
@section('main')
<div id="transaksi">
<div class="panel panel-default">
<div class="panel-heading"><b><h4>Detail Transaksi</h4></b></div>
<div class="panel-body">
<?php 
	function rupiah($nilai, $pecahan = 0) {
	return "Rp. " . number_format($nilai, $pecahan, ',', '.');
	} 
?>
<table class="table">
<tr><th>Kode Transaksi</th><td>{{ $transaksi->kodetransaksi }}</td></tr>
<tr><th>Jenis Transaksi</th><td>{{ $transaksi->jenistransaksi }}</td></tr>
<tr><th>Tanggal Transaksi</th><td>{{ date('d-m-Y', strtotime($transaksi->tanggaltransaksi)) }}</td></tr>
<tr><th>Jam Transaksi</th><td>{{ date('H:i', strtotime($transaksi->jamtransaksi)) }}</td></tr>
<tr><th>Tanggal Selesai</th><td>{{ date('d-m-Y', strtotime($transaksi->tanggalselesai)) }}</td></tr>
<tr><th>Jam Selesai</th><td>{{ date('H:i', strtotime($transaksi->jamselesai)) }}</td></tr>
<tr><th>Nama Customer</th><td>{{ $transaksi->customer->nama }}</td></tr>
<tr><th>Resep</th><td></td></tr>
<tr><td colspan='2'><b>Kanan</b> : 
	SPH = {{ $transaksi->customer->resep->r_sph }},
	CYL = {{ $transaksi->customer->resep->r_cyl }},
	AXS = {{ $transaksi->customer->resep->r_axs }},
	ADD = {{ $transaksi->customer->resep->r_add }},
	MPD = {{ $transaksi->customer->resep->r_mpd }},
	PV = {{ $transaksi->customer->resep->r_pv }},
	SH = {{ $transaksi->customer->resep->r_sh }}.
</td></tr>
<tr><td colspan='2'><b>Kiri</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
	SPH = {{ $transaksi->customer->resep->l_sph }},
	CYL = {{ $transaksi->customer->resep->l_cyl }},
	AXS = {{ $transaksi->customer->resep->l_axs }},
	ADD = {{ $transaksi->customer->resep->l_add }},
	MPD = {{ $transaksi->customer->resep->l_mpd }},
	PV = {{ $transaksi->customer->resep->l_pv }},
	SH = {{ $transaksi->customer->resep->l_sh }}.
</td></tr>
<tr><th>Nama Instansi</th><td>{{ $transaksi->instansi->nama_instansi }}</td></tr>
<tr><th>Nama Dokter</th><td>{{ $transaksi->dokter->nama_dokter }}</td></tr>
<tr><th>Nama Karyawan</th><td>{{ $transaksi->user->name }}</td></tr>
</table>
<h4>Detail Produk</h4>
<table class="table table-striped">
<tr><th>Kode</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Diskon</th><th>Total</th></tr>
@foreach($transaksi->produk as $item)
<?php
$nominal = $item->pivot->diskon;
$totalbeli =  ($item->hargajual * $item->pivot->jumlahbeli) - ($item->pivot->jumlahbeli * $nominal);
?>
<tr><td>{{ $item->kodeproduk }}</td><td>{{ $item->namaproduk }}</td><td>{{ rupiah($item->hargajual) }}</td>
	<td>{{ $item->pivot->jumlahbeli }}</td><td>{{ rupiah($item->pivot->diskon) }}</td><td>{{ rupiah($totalbeli) }}</td></tr>
@endforeach
<tr><td colspan="3"></td><th>Total</th><th>{{ rupiah($transaksi->totaldiskon) }}</th><th>{{ rupiah($transaksi->totalbelanja) }}</th></tr>
<tr><td colspan="4"></td><th>Asuransi</th><th>{{ rupiah($transaksi->asuransi) }}</th></tr>
<tr><td colspan="4"></td><th>Sub Total</th><th>{{ rupiah($transaksi->total) }}</th></tr>
<tr><td colspan="4"></td><th>Bayar / DP</th><th>{{ rupiah($transaksi->bayar) }}</th></tr>
<tr><td colspan="4"></td><th>Sisa</th><th>{{ rupiah($transaksi->sisa) }}</th></tr>
</table>
</div>
</div>
</div>
@stop

@section('footer')
@include('footer')
@stop