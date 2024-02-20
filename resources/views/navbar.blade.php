<nav class="navbar navbar-default">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" 
				data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@if(count($list_toko) > 0)
			@foreach($list_toko as $key1 => $value1)
			<a class="navbar-brand" href="{{ url('/')}}"><b>{{ $value1 }}</b></a>
			@endforeach
		@endif
	</div>
	<div class="collapse navbar-collapse"
		 id="bs-example-navbar-collapse-1">
		 <ul class="nav navbar-nav">
		 	<li class="dropdown">
		 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Data Master</a>
		 		<ul class="dropdown-menu" role="menu">
			 		@if (!empty($halaman) && $halaman == 'customer')
				 	<li class="active"><a href="{{ url('customer') }}">Data Customer</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('customer') }}">Data Customer</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'dokter')
				 	<li class="active"><a href="{{ url('dokter') }}">Data Dokter</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('dokter') }}">Data Dokter</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'instansi')
				 	<li class="active"><a href="{{ url('instansi') }}">Data Instansi</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('instansi') }}">Data Instansi</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'distributor')
				 	<li class="active"><a href="{{ url('distributor') }}">Data Distributor</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('distributor') }}">Data Distributor</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'kategoriproduk')
				 	<li class="active"><a href="{{ url('kategoriproduk') }}">Kategori Produk</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('kategoriproduk') }}">Kategori Produk</a></li>
				 	@endif
				</ul>
		 	</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produk</a>
				<ul class="dropdown-menu" role="menu">
					<!--@if (!empty($halaman) && $halaman == 'produk')
				 	<li class="active"><a href="{{ url('produk') }}">Semua Produk</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('produk') }}">Semua Produk</a></li>
				 	@endif-->
				@if(count($list_kategori) > 0)
					@foreach($list_kategori as $key => $value)
					<li><a href="{!! route('kategori', ['cat'=>$key]) !!}">{{ $value }}</a></li>
					@endforeach
				@endif
				</ul>
			</li>

			<li class="dropdown">
		 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Penjualan</a>
		 		<ul class="dropdown-menu" role="menu">
		 			@if (!empty($halaman) && $halaman == 'transaksi')
					<li class="active"><a href="{{ url('transaksi') }}">Semua Penjualan</a>
					<span class="sr-only">(current)</span></li>
					@else
					<li><a href="{{ url('transaksi') }}">Semua Penjualan</a></li>
					@endif
		 			<li><a href="{!! route('jenistransaksi', ['jenis'=>'pesan']) !!}">Pemesanan</a></li>
		 			<li><a href="{!! route('jenistransaksi', ['jenis'=>'retail']) !!}">Retail</a></li>
		 			<li><a href="{!! route('jenistransaksi', ['jenis'=>'grosir']) !!}">Grosir</a></li>
		 		</ul>
		 	</li>
		 	<li class="dropdown">
		 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan</a>
		 		<ul class="dropdown-menu" role="menu">
		 			<li><a href="{!! route('jenislaporan', ['jenis'=>'pesan']) !!}">Laporan Pemesanan</a></li>
		 			<li><a href="{!! route('jenislaporan', ['jenis'=>'retail']) !!}">Laporan Retail</a></li>
		 			<li><a href="{!! route('jenislaporan', ['jenis'=>'grosir']) !!}">Laporan Grosir</a></li>
		 			<li><a href="{!! route('jenislaporan', ['jenis'=>'beli']) !!}">Laporan Pembelian</a></li>
		 			<li><a href="{!! route('jenislaporan', ['jenis'=>'labarugi']) !!}">Laporan Laba / Rugi</a></li>
		 			<!--@if (!empty($halaman) && $halaman == 'lapretail')
				 	<li class="active"><a href="{{ url('lapretail') }}">Laporan Retail</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('lapretail') }}">Laporan Retail</a></li>
				 	@endif

			 		@if (!empty($halaman) && $halaman == 'lappesan')
				 	<li class="active"><a href="{{ url('lappesan') }}">Laporan Pemesanan</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('lappesan') }}">Laporan Pemesanan</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'lapgrosir')
				 	<li class="active"><a href="{{ url('lapgrosir') }}">Laporan Grosir</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('lapgrosir') }}">Laporan Grosir</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'lappembelian')
				 	<li class="active"><a href="{{ url('lappembelian') }}">Laporan Pembelian</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('lappembelian') }}">Laporan Pembelian</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'laplabarugi')
				 	<li class="active"><a href="{{ url('laplabarugi') }}">Laporan Laba / Rugi</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('laplabarugi') }}">Laporan Laba / Rugi</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'lapdokter')
				 	<li class="active"><a href="{{ url('lapdokter') }}">Laporan Dokter</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('lapdokter') }}">Laporan Dokter</a></li>
				 	@endif

				 	@if (!empty($halaman) && $halaman == 'lapinstansi')
				 	<li class="active"><a href="{{ url('lapinstansi') }}">Laporan Instansi</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('lapinstansi') }}">Laporan Instansi</a></li>
				 	@endif-->
				</ul>
		 	</li>
		 	<li class="dropdown">
		 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengaturan</a>
		 		<ul class="dropdown-menu" role="menu">
				 	@if (!empty($halaman) && $halaman == 'user')
					<li class="active"><a href="{{ url('user') }}">Data Pengguna</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('user') }}">Data Pengguna</a></li>
				 	@endif
				 	@if (!empty($halaman) && $halaman == 'profile')
					<li class="active"><a href="{{ url('profile/1/edit') }}">Profile Toko</a>
				 	<span class="sr-only">(current)</span></li>
				 	@else
				 	<li><a href="{{ url('profile/1/edit') }}">Profile Toko</a></li>
				 	@endif
				 	<li><a href="#">Backup / Restore</a></li>
		 		</ul>
		 	</li>
		 	<!--
		 	@if (!empty($halaman) && $halaman == 'siswa')
		 	<li class="active"><a href="{{ url('siswa') }}">Siswa</a>
		 	<span class="sr-only">(current)</span></li>
		 	@else
		 	<li><a href="{{ url('siswa') }}">Siswa</a></li>
		 	@endif

		 	@if (!empty($halaman) && $halaman == 'kelas')
		 	<li class="active"><a href="{{ url('kelas') }}">Kelas</a>
		 	<span class="sr-only">(current)</span></li></li>
		 	@else
		 	<li><a href="{{ url('kelas') }}">Kelas</a></li>
		 	@endif

		 	@if (!empty($halaman) && $halaman == 'hobi')
		 	<li class="active"><a href="{{ url('hobi') }}">Hobi</a>
		 	<span class="sr-only">(current)</span></li></li>
		 	@else
		 	<li><a href="{{ url('hobi') }}">Hobi</a></li>
		 	@endif
		 	
		 	@if (!empty($halaman) && $halaman == 'about')
		 	<li class="active"><a href="{{ url('about') }}">About</a>
		 	<span class="sr-only">(current)</span></li></li>
		 	@else
		 	<li><a href="{{ url('about') }}">About</a></li>
		 	@endif

		 	@if (!empty($halaman) && $halaman == 'user')
		 	<li class="active"><a href="{{ url('user') }}">User</a>
		 	<span class="sr-only">(current)</span></li></li>
		 	@else
		 	<li><a href="{{ url('user') }}">User</a></li>
		 	@endif-->
		 </ul>
		 <ul class="nav navbar-nav navbar-right">
		 	@if (Auth::check())
		 	<li class="dropdown">
		 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
		 		<ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                </ul>
		 	</li>
		 	@endif
		 </ul>
	</div>
</div>
</nav>

