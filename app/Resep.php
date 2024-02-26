<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    //protected $primaryKey = 'id_customer';
    //Hanya jika semua data disimpan tanpa seleksi
    protected $fillable = [
    	'id_customer',
    	'r_sph',
    	'l_sph',
    	'r_cyl',
    	'l_cyl',
    	'r_axs',
    	'l_axs',
    	'r_add',
    	'l_add',
		'pd',
		'visakhir',
		'A',
		'B',
		'dbl',
		'r_mpd',
		'l_mpd',
    	'shpv',
		'jenisframe',
		'koridor',
		'visusbalance',
		'dukeelder',
		'wrapangle',
		'pantoskopik',
		'vertexdistance',
		'catatan',
    ];
    //Relasi One to One ke customer
    public function customer(){
        return $this->belongTo('App\Customer', 'id_customer');
    }
}
