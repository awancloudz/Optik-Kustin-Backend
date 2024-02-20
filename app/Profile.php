<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
    	'nama',
    	'alamat',
    	'kota',
        'notelp',
        'promosi',
        'statustoko',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->hasMany('App\User', 'id_profile');
    }
    public function transaksi(){
        return $this->hasMany('App\Transaksi', 'id_profile');
    }
    public function pengiriman(){
        return $this->hasMany('App\Pengiriman', 'id_profile');
    }
    public function stockcabang(){
        return $this->hasMany('App\StockCabang', 'id_profile');
    }
}
