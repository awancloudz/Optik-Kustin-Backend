<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'distributor';

    protected $fillable = [
    	'nama_distributor',
    	'alamat',
        'notelp',
        'created_at',
        'updated_at'
    ];
}
