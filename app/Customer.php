<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'kodecustomer',
    	'nama',
    	'alamat',
        'notelp',
        'jenis',
        'tanggallahir',
        'umur',
        'jeniskelamin',
        'created_at',
        'updated_at'
    ];

    //Relasi One to One ke telepon
    // public function resep(){
    // 	return $this->hasOne('App\Resep', 'id_customer');
    // }
    public function resep(){
        return $this->hasMany('App\Resep', 'id_customer');
    }
}
