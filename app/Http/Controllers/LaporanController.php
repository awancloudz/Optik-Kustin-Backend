<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Transaksi;
use App\Customer;
use App\Instansi;
use App\Dokter;
use App\Users;
use App\Produk;
use App\Profile;
use PDF;
use DB;
use Excel;
use Validator;
use App\Http\Requests\TransaksiRequest;
use Session;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($jenis,$idprofile,$awal,$akhir,$status,$ambil)
    {
        if($idprofile == 0){
            $data = Transaksi::whereBetween('tanggaltransaksi', [$awal, $akhir])->where('jenistransaksi', $jenis)->where('status', $status)->where('statustransaksi', $ambil)->orderBy('created_at', 'desc')->get();
        }
        else{
            $data = Transaksi::whereBetween('tanggaltransaksi', [$awal, $akhir])->where('jenistransaksi', $jenis)->where('id_profile',$idprofile)->where('status', $status)->where('statustransaksi', $ambil)->orderBy('created_at', 'desc')->get();
        }
        $jumlah = $data->count();
        if($jumlah > 0){
            $transaksi = collect($data);
            $transaksi->toJson();
            return $transaksi;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $transaksi = collect($data);
            $transaksi->toJson();
            return $transaksi;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //Kategori Transaksi
    public function jenislap($jenis)
    {   
        if(($jenis == 'pesan') || ($jenis == 'retail') || ($jenis == 'grosir')){
        $transaksi_list = Transaksi::where('jenistransaksi',$jenis)->orderBy('kodetransaksi', 'desc')->paginate(10);
        $jumlah_transaksi = Transaksi::where('jenistransaksi',$jenis)->count(); 
        } 
        else if($jenis == 'beli'){

        }
        else if($jenis == 'labarugi'){

        }
        return view('laporan.index', compact('transaksi_list','jumlah_transaksi','jenis'));
    }
}
