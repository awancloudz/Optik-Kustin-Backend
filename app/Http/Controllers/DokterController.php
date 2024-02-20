<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Requests\DokterRequest;
use App\Dokter;
use Session;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter_list = Dokter::orderBy('nama_dokter', 'asc')->paginate(10);
        $jumlah_dokter = Dokter::count();
        return view('dokter.index', compact('dokter_list','jumlah_dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DokterRequest $request)
    {
        $input = $request->all();
        //Simpan Data dokter
        $dokter = Dokter::create($input);
        Session::flash('flash_message', 'Data Dokter Berhasil Disimpan');
        return redirect('dokter');
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
    public function edit(Dokter $dokter)
    {  
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Dokter $dokter, DokterRequest $request)
    {
        $input = $request->all();
        $dokter->update($input);

        Session::flash('flash_message', 'Data dokter berhasil diupdate');
        return redirect('dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        Session::flash('flash_message', 'Data dokter berhasil dihapus');
        Session::flash('Penting', true);
        return redirect('dokter');
    }

    //pencarian
    public function cari(Request $request){
        $kata_kunci = $request->input('kata_kunci');
        if(!empty($kata_kunci)){
            //Query
            $query = Dokter::where('nama_dokter', 'LIKE', '%' . $kata_kunci . '%');
            $dokter_list = $query->paginate(10);

            //Url Pagination
            $pagination = $dokter_list->appends($request->except('page'));
            $jumlah_dokter = $dokter_list->total();
            return view('dokter.index', compact('dokter_list','kata_kunci','pagination','jumlah_dokter'));
        }
        return redirect('dokter');
    }
}
