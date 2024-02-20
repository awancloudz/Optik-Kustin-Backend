<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //MASTER
        $halaman = '';
        if(Request::segment(1) == 'customer'){
            $halaman = 'customer';
        }
        if(Request::segment(1) == 'dokter'){
            $halaman = 'dokter';
        }
        if(Request::segment(1) == 'instansi'){
            $halaman = 'instansi';
        }
        if(Request::segment(1) == 'distributor'){
            $halaman = 'distributor';
        }
        if(Request::segment(1) == 'kategoriproduk'){
            $halaman = 'kategoriproduk';
        }

        if(Request::segment(1) == 'produk'){
            $halaman = 'produk';
        }

        //TRANSAKSI
        if(Request::segment(1) == 'transaksi'){
            $halaman = 'transaksi';
        }

        //LAPORAN
        /*if(Request::segment(1) == 'lapretail'){
            $halaman = 'lapretail';
        }
        if(Request::segment(1) == 'lappesan'){
            $halaman = 'lappesan';
        }
        if(Request::segment(1) == 'lapgrosir'){
            $halaman = 'lapgrosir';
        }
        if(Request::segment(1) == 'lappembelian'){
            $halaman = 'lappembelian';
        }
        if(Request::segment(1) == 'lapdokter'){
            $halaman = 'lapdokter';
        }
        if(Request::segment(1) == 'lapinstansi'){
            $halaman = 'lapinstansi';
        }*/

        //PENGATURAN
        if(Request::segment(1) == 'user'){
            $halaman = 'user';
        }
        if(Request::segment(1) == 'profile'){
            $halaman = 'profile';
        }
        view()->share('halaman', $halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
