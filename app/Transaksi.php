<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    //Hanya jika semua data disimpan tanpa seleksi
    protected $fillable = [
    	'kodetransaksi',
    	'jenistransaksi',
    	'tanggaltransaksi',
        'jamtransaksi',
    	'tanggalselesai',
        'jamselesai',
        'id_customer',
        'id_profile',
        'id_karyawan',
        'totaldiskon',
        'totalbelanja',
        'asuransi',
        'subtotal',
        'bayar',
        'kembali',
        'sisa',
        'catatan',
        'status',
        'statustoko',
        'statustransaksi',
        'statusresep',
        'metode',
        'created_at',
        'updated_at'
    ];

    //Relasi One to Many ke
    public function customer(){
        return $this->belongsTo('App\Customer', 'id_customer');
    }
    public function karyawan(){
        return $this->belongsTo('App\Karyawan', 'id_karyawan');
    }
    public function profile(){
        return $this->belongsTo('App\Profile', 'id_profile');
    }

    //Relasi one to many dari
    public function pengiriman(){
        return $this->hasMany('App\Pengiriman', 'id_transaksi');
    }
    public function detailtransaksi(){
        return $this->hasMany('App\DetailTransaksi', 'id_transaksi');
    }
    //Relasi Many to Many
    /*public function produk(){
        return $this->belongsToMany('App\Produk', 'detailtransaksi', 'id_transaksi', 'id_produk')->withPivot('jumlahbeli','diskon')->withTimeStamps();
    }*/

    //Mendapatkan id dari detail transaksi
    /*public function getDetailtransaksiAttribute(){
        return $this->produk->lists('id')->toArray();
    }*/
}
