<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $fillable = [
    	'id_transaksi',
    	'id_profile',
    	'status',
        'created_at',
        'updated_at'
    ];

    public function transaksi(){
        return $this->belongsTo('App\Transaksi', 'id_transaksi');
    }
    public function profile(){
        return $this->belongsTo('App\Profile', 'id_profile');
    }
}
