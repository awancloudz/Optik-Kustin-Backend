<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->double('r_sph');
            $table->double('l_sph');
            $table->double('r_cyl');
            $table->double('l_cyl');
            $table->double('r_axs');
            $table->double('l_axs');
            $table->double('r_add');
            $table->double('l_add');
            $table->double('r_mpd');
            $table->double('l_mpd');
            $table->double('r_pv');
            $table->double('l_pv');
            $table->double('r_sh');
            $table->double('l_sh');
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
        Schema::drop('resep');
    }
}
