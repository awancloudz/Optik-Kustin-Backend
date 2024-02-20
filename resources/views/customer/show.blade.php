@extends('template')
@section('main')
<div id="customer" class="panel panel-default">
	<div class="panel-heading"><b><h4>Data Customer</h4></b></div>
	<div class="panel-body">
		<table class="table table-striped">
		<tr><th>Nama</th><td colspan="2">{{ $customer->nama }}</td></tr>
		<tr><th>Alamat</th><td colspan="2">{{ $customer->alamat }}</td></tr>
		<tr><th>No.Telp</th><td colspan="2">{{ $customer->notelp }}</td></tr>
		<tr><th>Resep Lensa</th><th>Kanan</th><th>Kiri</td></tr>
		<tr>
			<th>SPH<br>CYL<br>AXS<br>ADD<br>MPD<br>PV<br>SH</th>
			<td>{{ $customer->resep->r_sph }}<br>{{ $customer->resep->r_cyl }}<br>{{ $customer->resep->r_axs }}<br>{{ $customer->resep->r_add }}<br>
				{{ $customer->resep->r_mpd }}<br>{{ $customer->resep->r_pv }}<br>{{ $customer->resep->r_sh }}
			</td>
			<td>{{ $customer->resep->l_sph }}<br>{{ $customer->resep->l_cyl }}<br>{{ $customer->resep->l_axs }}<br>{{ $customer->resep->l_add }}<br>
				{{ $customer->resep->l_mpd }}<br>{{ $customer->resep->l_pv }}<br>{{ $customer->resep->l_sh }}
			</td>
		</tr>
		</table>
	</div>
	</div>
</div>
@stop

@section('footer')
@include('footer')
@stop