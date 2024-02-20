<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->text('alamat');
            $table->string('kota');
            $table->string('notelp',50);
            $table->text('promosi');
            $table->enum('statustoko',['pusat','cabang']);
            $table->timestamps();
        });

        Schema::table('transaksi', function(Blueprint $table) {
            $table->foreign('id_profile')
                ->references('id')
                ->on('profile')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('stockcabang', function(Blueprint $table) {
            $table->foreign('id_profile')
                ->references('id')
                ->on('profile')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('id_profile')
                ->references('id')
                ->on('profile')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('pengiriman', function(Blueprint $table) {
            $table->foreign('id_profile')
                ->references('id')
                ->on('profile')
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
            $table->dropForeign('transaksi_id_profile_foreign');
        });
        Schema::table('stockcabang', function(Blueprint $table) {
            $table->dropForeign('stockcabang_id_profile_foreign');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_id_profile_foreign');
        });
        Schema::table('pengiriman', function(Blueprint $table) {
            $table->dropForeign('pengiriman_id_profile_foreign');
        });
        Schema::drop('profile');
    }
}
