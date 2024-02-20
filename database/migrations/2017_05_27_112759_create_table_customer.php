<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->text('alamat');
            $table->string('notelp', 20);
            $table->enum('jenis', ['customer','distributor','retail']);
            $table->date('tanggallahir');
            $table->timestamps();
        });
        Schema::table('transaksi', function(Blueprint $table) {
            $table->foreign('id_customer')
                ->references('id')
                ->on('customer')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('resep', function(Blueprint $table) {
            $table->foreign('id_customer')
                ->references('id')
                ->on('customer')
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
            $table->dropForeign('transaksi_id_customer_foreign');
        });
        Schema::table('resep', function(Blueprint $table) {
            $table->dropForeign('resep_id_customer_foreign');
        });
        Schema::drop('customer');
    }
}
