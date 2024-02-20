<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Customer;
use App\Instansi;
use App\Dokter;
use App\User;
use App\Produk;

class FormTransaksiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('transaksi.form', function($view){
        $view->with('list_customer', Customer::lists('nama', 'id'));
        $view->with('list_instansi', Instansi::lists('nama_instansi', 'id'));
        $view->with('list_dokter', Dokter::lists('nama_dokter', 'id'));
        $view->with('list_user', User::lists('name', 'id'));
        $view->with('list_produk', Produk::lists('namaproduk','id'));
        });
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
