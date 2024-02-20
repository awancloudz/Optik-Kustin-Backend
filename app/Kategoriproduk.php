<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriproduk extends Model
{
    protected $table = 'kategoriproduk';

    protected $fillable = [
    	'nama',
        'keterangan',
        'created_at',
        'updated_at'
    ];

    public function produk(){
    	return $this->hasMany('App\Produk', 'id_kategoriproduk');
    }
    public function merk(){
    	return $this->hasMany('App\Merk', 'id_kategoriproduk');
    }
}
