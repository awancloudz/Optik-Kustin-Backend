<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodetransaksi',50)->unique();
            $table->enum('jenistransaksi',['pembelian','retail','grosir','pesan','kirimcabang']);
            $table->date('tanggaltransaksi');
            $table->time('jamtransaksi');
            $table->date('tanggalselesai');
            $table->time('jamselesai');
            $table->integer('id_customer')->unsigned();
            $table->integer('id_profile')->unsigned();
            $table->integer('id_karyawan')->unsigned();
            $table->double('totaldiskon');
            $table->double('totalbelanja');
            $table->double('asuransi');
            $table->double('subtotal');
            $table->double('bayar');
            $table->double('kembali');
            $table->double('sisa');
            $table->text('catatan');
            $table->enum('status',['lunas','belum']);
            $table->enum('statustoko',['pusat','cabang']);
            $table->enum('statustransaksi',['belum','sudah','batal']);
            $table->integer('statusresep');
            $table->enum('metode',['debit','cash']);
            $table->timestamps();
        });
        Schema::table('detailtransaksi', function(Blueprint $table) {
            $table->foreign('id_transaksi')
                ->references('id')
                ->on('transaksi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('pengiriman', function(Blueprint $table) {
            $table->foreign('id_transaksi')
                ->references('id')
                ->on('transaksi')
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
        Schema::table('detailtransaksi', function(Blueprint $table) {
            $table->dropForeign('detailtransaksi_id_transaksi_foreign');
        });
        Schema::table('pengiriman', function(Blueprint $table) {
            $table->dropForeign('pengiriman_id_transaksi_foreign');
        });
        Schema::drop('transaksi');
    }
}
