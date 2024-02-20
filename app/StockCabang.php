<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockCabang extends Model
{
    protected $table = 'stockcabang';

    //Hanya jika semua data disimpan tanpa seleksi
    protected $fillable = [
    	'id_produk',
    	'id_profile',
        'hargajual',
        'diskon',
        'stok',
        'created_at',
        'updated_at'
    ];

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
    public function profile(){
        return $this->belongsTo('App\Profile', 'id_profile');
    }
}
