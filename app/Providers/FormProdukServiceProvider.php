<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Distributor;
use App\Kategoriproduk;

class FormProdukServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('produk.form', function($view){
        $view->with('list_distributor', Distributor::lists('nama_distributor', 'id'));
        $view->with('list_kategoriproduk', Kategoriproduk::lists('nama', 'id'));
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
