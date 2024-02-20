<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('alamat');
            $table->string('notelp');
            $table->double('gajipokok');
            $table->enum('status', ['aktif','nonaktif']);
            $table->timestamps();
        });
        Schema::table('transaksi', function(Blueprint $table) {
            $table->foreign('id_karyawan')
                ->references('id')
                ->on('karyawan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('keranjang', function(Blueprint $table) {
            $table->foreign('id_karyawan')
                ->references('id')
                ->on('karyawan')
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
        Schema::table('transaksi', function(Blueprint $table) {
            $table->dropForeign('transaksi_id_karyawan_foreign');
        });
        Schema::table('keranjang', function(Blueprint $table) {
            $table->dropForeign('keranjang_id_karyawan_foreign');
        });
        Schema::drop('karyawan');
    }
}
