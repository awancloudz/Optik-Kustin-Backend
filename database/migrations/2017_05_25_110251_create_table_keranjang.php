<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKeranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_karyawan')->unsigned();
            $table->integer('id_produk')->unsigned();
            $table->double('harga');
            $table->integer('jumlah');
            $table->double('diskon');
            $table->double('total');
            $table->enum('jenistransaksi',['pembelian','retail','grosir','pesan','kirimcabang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keranjang');
    }
}
