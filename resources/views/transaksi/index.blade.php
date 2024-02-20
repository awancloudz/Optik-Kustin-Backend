@extends('template')

@section('main')
<div id="transaksi" class="panel panel-default">
@if ($caritrans == 1)
<!-- Deteksi jenis transaksi -->
<script type="text/javascript">
<?php echo "var jenis = '{$jenis}';"; ?>
window.localStorage['jenistrans'] = jenis;
</script>

	<div class="panel-heading"><b><h4>Data Transaksi - 
	@if ($jenis == 'pesan')
	Pemesanan
	@elseif ($jenis == 'retail')
	Retail
	@elseif ($jenis == 'grosir')
	Grosir
	@endif
	</h4></b></div>
@else
	<script type="text/javascript">window.localStorage['jenistrans'] = "semua";</script>
	<div class="panel-heading"><b><h4>Data Transaksi</h4></b></div>
@endif
	<div class="panel-body">
	@include('_partial.flash_message')
	@include('transaksi.form_pencarian')
	@include('transaksi.form_pencarian_barcode')
	<div class="tombol-nav">
		{{ link_to('transaksi/create','Tambah Transaksi',['class' => 'btn btn-primary']) }}
	</div><br>
	<!-- Tampil Transaksi -->
	@if (count($transaksi_list) > 0)
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
			<?php 
			function rupiah($nilai, $pecahan = 0) {
			return "Rp. " . number_format($nilai, $pecahan, ',', '.');
			} 
			?>
			<?php $i=0; ?>
			<?php foreach($transaksi_list as $transaksi): ?>
			<tr>
				<td>{{ $transaksi->kodetransaksi }}</td>
				<td>{{ $transaksi->customer->nama }}</td>
				<td>{{ date('d-m-Y', strtotime($transaksi->tanggaltransaksi)) }}</td>
				<td>{{ date('d-m-Y', strtotime($transaksi->tanggalselesai)) }}</td>
				<td>{{ rupiah($transaksi->totalbelanja) }}</td>
				<td>{{ rupiah($transaksi->asuransi) }}</td>
				<td>{{ rupiah($transaksi->totaldiskon) }}</td>
				<td>{{ rupiah($transaksi->total) }}</td>
				<td>{{ rupiah($transaksi->bayar) }}</td>
				@if($transaksi->sisa != 0)
				<td><font color='red'>{{ rupiah($transaksi->sisa) }}</font></td>
				@else
				<td><font color='blue'>{{ rupiah($transaksi->sisa) }}</font></td>
				@endif
				<td>
					<div class="box-button"> 
					{{ link_to('transaksi/' . $transaksi->id,'Detail',['class' => 'btn btn-success btn-sm']) }}</div>
					<div class="box-button">
					{{ link_to('transaksi/' . $transaksi->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['TransaksiController@destroy',$transaksi->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!! Form::close()!!}
					</div>
					<div class="box-button">
						@if ($transaksi->jenistransaksi == 'pesan')
							{{ link_to('transaksi/print/' . $transaksi->id,'Cetak',['class' => 'btn btn-primary btn-sm','target'=>'_blank']) }}
						@elseif ($transaksi->jenistransaksi == 'retail')
							{{ link_to('transaksi/print2/' . $transaksi->id,'Cetak',['class' => 'btn btn-primary btn-sm','target'=>'_blank']) }}
						@elseif ($transaksi->jenistransaksi == 'grosir')
							{{ link_to('transaksi/print2/' . $transaksi->id,'Cetak',['class' => 'btn btn-primary btn-sm','target'=>'_blank']) }}
						@endif 
					</div>
					<div class="box-button">
						@if (($transaksi->jenistransaksi == 'pesan') && ($transaksi->status == 0))
							{!! Form::model($transaksi, ['method' => 'PATCH','id'=>'myform', 'action' => ['TransaksiController@ambil', $transaksi->id],'files'=>true]) !!}
							{!! Form::submit('Ambil', ['class' => 'btn btn-info btn-sm'])!!}
							{!! Form::close()!!}
						@endif
					</div>
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