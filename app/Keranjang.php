<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    //Hanya jika semua data disimpan tanpa seleksi
    protected $fillable = [
    	'id_karyawan',
        'id_produk',
        'harga',
        'jumlah',
        'diskon',
        'total',
        'jenistransaksi',
        'created_at',
        'updated_at'
    ];

    public function karyawan(){
        return $this->belongsTo('App\Karyawan', 'id_karyawan');
    }
    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
    
}
