<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Requests\InstansiRequest;
use App\Instansi;
use Session;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansi_list = Instansi::orderBy('nama_instansi', 'asc')->paginate(10);
        $jumlah_instansi = Instansi::count();
        return view('instansi.index', compact('instansi_list','jumlah_instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstansiRequest $request)
    {
        $input = $request->all();
        //Simpan Data Instansi
        $instansi = Instansi::create($input);
        Session::flash('flash_message', 'Data Instansi Berhasil Disimpan');
        return redirect('instansi');
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
    public function edit(Instansi $instansi)
    {  
        return view('instansi.edit', compact('instansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Instansi $instansi, InstansiRequest $request)
    {
        $input = $request->all();
        $instansi->update($input);

        Session::flash('flash_message', 'Data instansi berhasil diupdate');
        return redirect('instansi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        Session::flash('flash_message', 'Data instansi berhasil dihapus');
        Session::flash('Penting', true);
        return redirect('instansi');
    }

    //pencarian
    public function cari(Request $request){
        $kata_kunci = $request->input('kata_kunci');
        if(!empty($kata_kunci)){
            //Query
            $query = Instansi::where('nama_instansi', 'LIKE', '%' . $kata_kunci . '%');
            $instansi_list = $query->paginate(10);

            //Url Pagination
            $pagination = $instansi_list->appends($request->except('page'));
            $jumlah_instansi = $instansi_list->total();
            return view('instansi.index', compact('instansi_list','kata_kunci','pagination','jumlah_instansi'));
        }
        return redirect('instansi');
    }
      
}
