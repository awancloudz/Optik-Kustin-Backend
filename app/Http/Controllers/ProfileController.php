<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Profile;
use App\StockCabang;
use App\Transaksi;
use App\Produk;

class ProfileController extends Controller
{
    public function index(){
        $data = Profile::orderBy('id', 'asc')->where('statustoko','=','cabang')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function indexall(){
        $data = Profile::orderBy('id', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function indexpusat(){
        $data = Profile::orderBy('id', 'asc')->where('statustoko','=','pusat')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function stok($id){
        $data = StockCabang::join('produk','produk.id','=','stockcabang.id_produk')
        ->select('produk.id','produk.kodeproduk','produk.id_kategoriproduk','produk.id_merk','produk.namaproduk','produk.seriproduk','produk.foto','stockcabang.*')
        ->where('id_profile', $id)->with('produk.merk','produk.kategoriproduk')->with('profile')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function stokkategori($id,$idcat){
        $data = StockCabang::join('produk','produk.id','=','stockcabang.id_produk')
        ->select('produk.id','produk.kodeproduk','produk.id_kategoriproduk','produk.id_merk','produk.namaproduk','produk.seriproduk','produk.foto','stockcabang.*')
        ->where('id_profile', $id)->where('produk.id_kategoriproduk', $idcat)->with('produk.merk','produk.kategoriproduk')->with('profile')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function stokmerk($id,$idmerk){
        $data = StockCabang::join('produk','produk.id','=','stockcabang.id_produk')
        ->select('produk.id','produk.kodeproduk','produk.id_kategoriproduk','produk.id_merk','produk.namaproduk','produk.seriproduk','produk.foto','stockcabang.*')
        ->where('id_profile', $id)->where('produk.id_merk', $idmerk)->with('produk.merk','produk.kategoriproduk')->with('profile')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $profile = Profile::create($input);
        $produk = Produk::all();
        foreach($produk as $prod){
            $stockcabang = new StockCabang;
            $stockcabang->id_produk = $prod->id;
            $stockcabang->id_profile = $profile->id;
            $stockcabang->hargajual = $prod->hargajual;
            $stockcabang->diskon = $prod->diskon;
            $stockcabang->stok = 0;
            $stockcabang->save();
        }
        return $profile;
    }
    
    public function show($id){
        $data = Profile::findOrFail($id);
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $profile = Profile::findOrFail($id);
        $input = $request->all();
        $profile->update($input);
        return $profile;
    }

    public function updatestok(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $stockcabang = StockCabang::findOrFail($id);
        $input = $request->all();
        $stockcabang->update($input);
        return $stockcabang;
    }

    public function destroy($id){
        settype($id, "integer");
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return $profile;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('nama');
        //Query
        $data = Profile::where('nama', 'LIKE', '%' . $kata_kunci . '%')->where('statustoko','=','cabang')
            ->orderBy('id', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }
    public function caristok(Request $request){
        $kata_kunci = $request->input('nama');
        $cabang = $request->input('id');
        //Query
        $data = StockCabang::join('produk','produk.id','=','stockcabang.id_produk')
        ->select('produk.id','produk.kodeproduk','produk.id_kategoriproduk','produk.id_merk','produk.namaproduk','produk.seriproduk','produk.foto','stockcabang.*')
        ->where(function($query) use ($kata_kunci) {
            $query->where('produk.kodeproduk', 'LIKE', '%'.$kata_kunci.'%')
            ->orWhere('produk.namaproduk', 'LIKE', '%'.$kata_kunci.'%')
            ->orWhere('produk.seriproduk', 'LIKE', '%'.$kata_kunci.'%');
        })->where('id_profile',$cabang)->with('produk.merk')->with('profile')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $profile = collect($data);
            $profile->toJson();
            return $profile;
        }
    }
}
