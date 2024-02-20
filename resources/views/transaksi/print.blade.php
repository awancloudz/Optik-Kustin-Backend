<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Transaksi</title>
        <style>
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
            </table>
            <table width="100%">
            <tr><td colspan="3"><b>TANDA TERIMA PESANAN (SO)</b></td></tr>
            <tr><td colspan="3">---------------------------------------------------------------------------</td></tr>
            <tr><th>Tanggal Pesan</th><td>: {{ date('d-m-Y', strtotime($transaksi->tanggaltransaksi)) }}</td><td>Jam {{ date('H:i', strtotime($transaksi->jamselesai)) }}</td></tr>
            <tr><th>Tanggal Selesai</th><td>: {{ date('d-m-Y', strtotime($transaksi->tanggalselesai)) }}</td><td>Jam {{ date('H:i', strtotime($transaksi->jamtransaksi)) }}</td></tr>
            <tr><td colspan="3"><br></td></tr>
            <tr><th>Total</th><td>: </td><td align="right">{{ rupiah($transaksi->total) }}</td></tr>
            <tr><th>D/P</th><td>: </td><td align="right">{{ rupiah($transaksi->bayar) }}</td></tr>
            <tr><th>Sisa</th><td>: </td><td align="right">{{ rupiah($transaksi->sisa) }}</td></tr>
            <tr><td colspan="3">---------------------------------------------------------------------------</td></tr>
            <tr><td colspan="3">Keterangan :</td></tr>
            <tr><th>1.Frame</th><td colspan="2"></td></tr>
            @foreach($transaksi->produk as $item)            
            <?php
            if($item->id_kategoriproduk == 1){
            echo "<tr><td></td><td>- ".$item->namaproduk."</td><td align='right'>".rupiah($item->hargajual)."</td><td></tr>";
            }
            ?>
            @endforeach
            <tr><th>2.Lensa</th><td colspan="2"></td></tr>
            @foreach($transaksi->produk as $item2)            
            <?php
            if($item->id_kategoriproduk == 2){
            echo "<tr><td></td><td>- ".$item2->namaproduk."</td><td align='right'>".$item2->hargajual."</td><td></tr>";
            }
            ?>
            @endforeach
            <tr><td colspan="2">---------------------------------------------------------------------------</td></tr>
            </table>
            <table width="100%">
            <!--<tr><th>Resep Lensa</th><td>Kanan</td><td>Kiri</td></tr>
            <tr><td>
                SPH<br>
                CYL<br>
                AXS<br>
                ADD<br>
                MPD<br>
                PV<br>
                SH<br>
            </td>
            <td>
                {{ $transaksi->customer->resep->r_sph }}<br>
                {{ $transaksi->customer->resep->r_cyl }}<br>
                {{ $transaksi->customer->resep->r_axs }}<br>
                {{ $transaksi->customer->resep->r_add }}<br>
                {{ $transaksi->customer->resep->r_mpd }}<br>
                {{ $transaksi->customer->resep->r_pv }}<br>
                {{ $transaksi->customer->resep->r_sh }}<br>
            </td>
            <td>
                {{ $transaksi->customer->resep->l_sph }}<br>
                {{ $transaksi->customer->resep->l_cyl }}<br>
                {{ $transaksi->customer->resep->l_axs }}<br>
                {{ $transaksi->customer->resep->l_add }}<br>
                {{ $transaksi->customer->resep->l_mpd }}<br>
                {{ $transaksi->customer->resep->l_pv }}<br>
                {{ $transaksi->customer->resep->l_sh }}<br>
            </td></tr>
            <tr><td colspan="3"><hr></td></tr>-->
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