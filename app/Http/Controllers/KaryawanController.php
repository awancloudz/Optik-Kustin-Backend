<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Karyawan;
use Session;

class KaryawanController extends Controller
{
    public function index(){
        $data = Karyawan::orderBy('nama', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $karyawan = collect($data);
            $karyawan->toJson();
            return $karyawan;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $karyawan = collect($data);
            $karyawan->toJson();
            return $karyawan;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $karyawan = Karyawan::create($input);
        return $karyawan;
    }
    
    public function show($id){
        $data = Karyawan::findOrFail($id);
        $jumlah = $data->count();
        if($jumlah > 0){
            $karyawan = collect($data);
            $karyawan->toJson();
            return $karyawan;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $karyawan = collect($data);
            $karyawan->toJson();
            return $karyawan;
        }
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $karyawan = Karyawan::findOrFail($id);
        $input = $request->all();
        $karyawan->update($input);
        return $karyawan;
    }

    public function destroy($id){
        settype($id, "integer");
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return $karyawan;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('nama');
        //Query
        $data = Karyawan::where('nama', 'LIKE', '%' . $kata_kunci . '%')
        ->orderBy('nama', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $karyawan = collect($data);
            $karyawan->toJson();
            return $karyawan;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $karyawan = collect($data);
            $karyawan->toJson();
            return $karyawan;
        }
    }
}
