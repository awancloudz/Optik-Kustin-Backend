<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detailtransaksi';

    //Hanya jika semua data disimpan tanpa seleksi
    protected $fillable = [
    	'id_produk',
        'id_transaksi',
        'harga',
        'jumlah',
        'diskon',
        'total',
        'created_at',
        'updated_at'
    ];

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
    public function transaksi(){
        return $this->belongsTo('App\Transaksi', 'id_transaksi');
    }
}
