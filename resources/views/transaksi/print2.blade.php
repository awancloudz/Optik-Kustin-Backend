<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Transaksi</title>
        <style type="text/css">
        @page { margin: 20px; margin-top:5px;}
        body{
            font-family: helvetica;
        }
        </style>
    </head>
        <body>  
            <?php 
                function rupiah($nilai, $pecahan = 0) {
                return "Rp. " . number_format($nilai, $pecahan, ',', '.');
                } 
            ?>
            <p align="center">
            <?php
            echo DNS1D::getBarcodeHTML($transaksi->kodetransaksi, "C128", 3,100);
            ?>
            </p>
            <center>{{ $transaksi->kodetransaksi }}</center>
            
            <table width="100%">
            @foreach ($profiletoko as $toko)
            <tr><td colspan="2">{{ $toko->nama }}<br>{{ $toko->alamat }}<br>Kota {{ $toko->kota }}<br>Telp.{{ $toko->notelp }}<br><br></td></tr>
            @endforeach
            <tr><th>Nama</th><td>: {{ $transaksi->customer->nama }}</td></tr>
            <tr><th>Alamat</th><td>: {{ $transaksi->customer->alamat }}</td></tr>
            <tr><th>No.Hp</th><td>: {{ $transaksi->customer->notelp }}</td></tr>
            <tr><th>Email</th><td>: -</td></tr>
            <tr><td colspan="2"><b>PENJUALAN LANGSUNG</b></td></tr>
            <tr><td colspan="2">---------------------------------------------------------------------------</td></tr>
            <tr><th>Tanggal Transaksi</th><td>: {{ date('d-m-Y', strtotime($transaksi->tanggaltransaksi)) }}</td></tr>
            <tr><th>Jam</th><td>: {{ date('H:i', strtotime($transaksi->jamtransaksi)) }}</td></tr>
            <tr><td colspan="2">---------------------------------------------------------------------------</td></tr>
            </table>
            <table width="100%">
            <tr><th>Keterangan</th><th align="center">Quantity</th><th>Total</th></tr>
            <tr><td colspan="3">---------------------------------------------------------------------------</td></tr>
            @foreach($transaksi->produk as $item)
            <tr><td>{{ $item->namaproduk }}</td><td align="center">{{ $item->pivot->jumlahbeli }}</td><td>{{ rupiah($item->hargajual) }}</td></tr>
            @endforeach
            <tr><td colspan="2"></td><td><hr></td></tr>
            <tr><th colspan="2">Sub Total</th><td>{{ rupiah($transaksi->total) }}</td></tr>
            <tr><td colspan="2"></td><td><hr></td></tr>
            <tr><th colspan="2">LUNAS</th><td>{{ rupiah($transaksi->bayar) }}</td></tr>
            <tr><td colspan="3">---------------------------------------------------------------------------</td></tr>
            <tr><td colspan="3">Terima Kasih</td></tr>
            @foreach ($profiletoko as $toko1)
            <tr><td colspan="3" align="justify">{{ $toko->promosi }}</td></tr>
            @endforeach
            <tr><td colspan="3">---------------------------------------------------------------------------</td></tr>
            <tr><th>Karyawan</th><td colspan="2">: {{ $transaksi->user->name }}</td></tr>
            </table>
        <script type="text/javascript">
          print();
        </script>
        </body>
</html>