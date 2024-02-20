<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Resep Customer</title>
        <style type="text/css">
        @page { margin: 20px; margin-top:5px;}
        </style>
    </head>
        <body>  
            <p align="center">
            <table width="100%">
            @foreach ($profiletoko as $toko)
            <tr><td colspan="2">{{ $toko->nama }}<br>{{ $toko->alamat }}<br>Kota {{ $toko->kota }}<br>Telp.{{ $toko->notelp }}<br><br></td></tr>
            @endforeach
            <tr><th>Nama</th><td>: {{ $customer->nama }}</td></tr>
            <tr><th>Alamat</th><td>: {{ $customer->alamat }}</td></tr>
            <tr><th>No.Hp</th><td>: {{ $customer->notelp }}</td></tr>
            <tr><th>Email</th><td>: -</td></tr>
            </table>
            <table width="100%">
            <tr><td colspan="3"><br></td></tr>
            <tr><td colspan="3"><b>RESEP</b><hr></td></tr>
            <tr><th>Resep Lensa</th><td>Kanan</td><td>Kiri</td></tr>
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
                {{ $customer->resep->r_sph }}<br>
                {{ $customer->resep->r_cyl }}<br>
                {{ $customer->resep->r_axs }}<br>
                {{ $customer->resep->r_add }}<br>
                {{ $customer->resep->r_mpd }}<br>
                {{ $customer->resep->r_pv }}<br>
                {{ $customer->resep->r_sh }}<br>
            </td>
            <td>
                {{ $customer->resep->l_sph }}<br>
                {{ $customer->resep->l_cyl }}<br>
                {{ $customer->resep->l_axs }}<br>
                {{ $customer->resep->l_add }}<br>
                {{ $customer->resep->l_mpd }}<br>
                {{ $customer->resep->l_pv }}<br>
                {{ $customer->resep->l_sh }}<br>
            </td></tr>
            </table>
        <script type="text/javascript">
          print();
        </script>
        </body>
</html>