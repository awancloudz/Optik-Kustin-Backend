<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Requests\KategoriprodukRequest;
use App\Kategoriproduk;

class KategoriprodukController extends Controller
{
    public function index(){
        $data = Kategoriproduk::orderBy('id', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $kategoriproduk = collect($data);
            $kategoriproduk->toJson();
            return $kategoriproduk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $kategoriproduk = collect($data);
            $kategoriproduk->toJson();
            return $kategoriproduk;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $kategoriproduk = Kategoriproduk::create($input);
        return $kategoriproduk;
    }
    
    public function show($id){
        $data = Kategoriproduk::findOrFail($id);
        $jumlah = $data->count();
        if($jumlah > 0){
            $kategoriproduk = collect($data);
            $kategoriproduk->toJson();
            return $kategoriproduk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $kategoriproduk = collect($data);
            $kategoriproduk->toJson();
            return $kategoriproduk;
        }
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $kategoriproduk = Kategoriproduk::findOrFail($id);
        $input = $request->all();
        $kategoriproduk->update($input);
        return $kategoriproduk;
    }

    public function destroy($id){
        settype($id, "integer");
        $kategoriproduk = Kategoriproduk::findOrFail($id);
        $kategoriproduk->delete();
        return $kategoriproduk;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('nama');
        //Query
        $data = Kategoriproduk::where('nama', 'LIKE', '%' . $kata_kunci . '%')
            ->orderBy('id', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $kategoriproduk = collect($data);
            $kategoriproduk->toJson();
            return $kategoriproduk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $kategoriproduk = collect($data);
            $kategoriproduk->toJson();
            return $kategoriproduk;
        }
    }
}
