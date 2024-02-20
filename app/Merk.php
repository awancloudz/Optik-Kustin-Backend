<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';

    protected $fillable = [
        'nama',
        'id_kategoriproduk',
        'keterangan',
        'created_at',
        'updated_at'
    ];

    public function kategoriproduk(){
        return $this->belongsTo('App\Kategoriproduk', 'id_kategoriproduk');
    }
    
    public function produk(){
    	return $this->hasMany('App\Produk', 'id_merk');
    }
}
