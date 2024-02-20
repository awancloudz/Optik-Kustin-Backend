<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
    	'nama_dokter',
    	'alamat',
        'notelp',
        'keterangan',
        'resep',
        'created_at',
        'updated_at'
    ];

}
