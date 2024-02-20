<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Merk;
use App\Produk;
use App\Kategoriproduk;

class MerkController extends Controller
{
    public function index(){
        $data = Merk::with('kategoriproduk')->orderBy('id_kategoriproduk', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
    }

    public function kategorimerk($cat){
        $data = Merk::where('id_kategoriproduk',$cat)->orderBy('id', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
    }

    public function merk($id){
        $mencari = 0;
        $data = Produk::where('id_merk',$id)->orderBy('id_merk', 'asc')
        ->with('merk')->with('kategoriproduk')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $produk = collect($data);
            $produk->toJson();
            return $produk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $produk = collect($data);
            $produk->toJson();
            return $produk;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $merk = Merk::create($input);
        return $merk;
    }
    
    public function show($id){
        $data = Merk::findOrFail($id);
        $jumlah = $data->count();
        if($jumlah > 0){
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $merk = Merk::findOrFail($id);
        $input = $request->all();
        $merk->update($input);
        return $merk;
    }

    public function destroy($id){
        settype($id, "integer");
        $merk = Merk::findOrFail($id);
        $merk->delete();
        return $merk;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('nama');
        //Query
        $data = Merk::where('nama', 'LIKE', '%' . $kata_kunci . '%')
        ->with('kategoriproduk')    
        ->orderBy('id_kategoriproduk', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $merk = collect($data);
            $merk->toJson();
            return $merk;
        }
    }
}
