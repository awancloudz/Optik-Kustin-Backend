<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodeproduk',50)->unique();
            $table->integer('id_kategoriproduk')->unsigned();
            $table->integer('id_merk')->unsigned();
            $table->string('namaproduk',50);
            $table->string('seriproduk',50);
            $table->double('hargajual');
            $table->double('hargagrosir');
            $table->double('hargadistributor');
            $table->double('diskon');
            $table->integer('stok');
            $table->string('foto')->nullable;
            $table->timestamps();
        });
        Schema::table('stockcabang', function(Blueprint $table) {
            $table->foreign('id_produk')
                ->references('id')
                ->on('produk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('detailtransaksi', function(Blueprint $table) {
            $table->foreign('id_produk')
                ->references('id')
                ->on('produk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('keranjang', function(Blueprint $table) {
            $table->foreign('id_produk')
                ->references('id')
                ->on('produk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stockcabang', function(Blueprint $table) {
            $table->dropForeign('stockcabang_id_produk_foreign');
        });
        Schema::table('detailtransaksi', function(Blueprint $table) {
            $table->dropForeign('detailtransaksi_id_produk_foreign');
        });
        Schema::table('keranjang', function(Blueprint $table) {
            $table->dropForeign('keranjang_id_produk_foreign');
        });
        Schema::drop('produk');
    }
}
