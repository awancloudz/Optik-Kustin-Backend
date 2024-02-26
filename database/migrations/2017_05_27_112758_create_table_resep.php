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
            $table->double('pd');
            $table->string('visakhir',50);
            $table->double('A');
            $table->double('B');
            $table->double('dbl');
            $table->double('r_mpd');
            $table->double('l_mpd');
            $table->double('shpv');
            $table->string('jenisframe',50);
            $table->string('koridor',50);
            $table->string('visusbalance',50);
            $table->string('dukeelder',50);
            $table->string('wrapangle',50);
            $table->string('pantoskopik',50);
            $table->string('vertexdistance',50);
            $table->text('catatan');
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
