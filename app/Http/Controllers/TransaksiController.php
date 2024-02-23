<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Transaksi;
use App\DetailTransaksi;
use App\Keranjang;
use App\Customer;
use App\Resep;
use App\Users;
use App\Produk;
use App\Profile;
use App\Karyawan;
use App\Pengiriman;
use App\Merk;
use App\StockCabang;
use App\Http\Requests\TransaksiRequest;

class TransaksiController extends Controller
{
    public function index($jenis,$idprofile){
        $data = Transaksi::where('jenistransaksi', $jenis)->where('id_profile',$idprofile)->orderBy('created_at', 'desc')->get();
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
    public function view($idtrans){
        settype($idtrans, "integer");
        $data = Transaksi::where('id', $idtrans)->with('customer.resep')->with('karyawan')->with('detailtransaksi.produk.merk')->with('profile')->with('pengiriman.profile')->orderBy('created_at', 'desc')->get();
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
    public function viewsuratorder($idtrans){
        settype($idtrans, "integer");
        $data = Transaksi::where('id', $idtrans)->with('customer.resep')->with('karyawan')->with('detailtransaksi.produk.merk')->with('profile')->with('pengiriman.profile')->orderBy('created_at', 'desc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $transaksi = collect($data);
            $transaksi->toJson();

            $parsed_data = json_decode($transaksi, true);
            if (is_array($parsed_data) && count($parsed_data) === 1) {
                $parsed_data = reset($parsed_data);
            }
            $new_json_data = json_encode($parsed_data);
            return $new_json_data;
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
    public function store(Request $request){
        //1. Mengambil value dari input text
        $input = $request->all();
        $idkaryawan = $request->input('id_karyawan');
        settype($idkaryawan, "integer");
            //Seleksi transaksi terakhir
            $transaksiakhir = Transaksi::where('id_karyawan', $idkaryawan);
            $kodeakhir = $transaksiakhir->orderBy('id', 'desc')->first();
            //$hariini = date("YmdHis");
            if($request->jenistransaksi == 'retail'){
                $trx = "1";
            }
            else if($request->jenistransaksi == 'pesan'){
                $trx = "2";
            }
            else if($request->jenistransaksi == 'pembelian'){
                $trx = "3";
            }
            else if($request->jenistransaksi == 'grosir'){
                $trx = "4";
            }
            else if($request->jenistransaksi == 'kirimcabang'){
                $trx = "5";
            }
            if($transaksiakhir->count() > 0){
                $kodetransaksi = $trx . $idkaryawan . sprintf("%05s", $kodeakhir->id + 1);
            }
            else
            {
                $kodetransaksi = $trx . $idkaryawan . "00001";
            }
        $input['kodetransaksi'] = $kodetransaksi;

        //2. Simpan Data Transaksi 
        $transaksi = Transaksi::create($input);
        //Ambil ID Transaksi
        $jenistrans = $request->input('jenistransaksi');
        $id_awal = Transaksi::where('id_karyawan', $idkaryawan)->orderBy('id', 'desc')->first();
        $idtransaksi = $id_awal->id;
        settype($idtransaksi, "integer");
        //Tampilkan Keranjang
        $daftar = Keranjang::all();
        $daftarkeranjang = $daftar->where('id_karyawan',$idkaryawan)->where('jenistransaksi',$jenistrans);
        //Pengiriman
        if($jenistrans == 'kirimcabang'){
            $pengiriman = New Pengiriman;
            $pengiriman->id_transaksi = $idtransaksi;
            $pengiriman->id_profile = $request->id_customer;
            $pengiriman->status = "kirim";
            $pengiriman->save();
        }
        //Simpan DetailPenjualan
        foreach($daftarkeranjang as $keranjang){
            $detailtransaksi = New DetailTransaksi;
            $detailtransaksi->id_produk = $keranjang->id_produk;
            $detailtransaksi->id_transaksi = $idtransaksi;
            $detailtransaksi->harga = $keranjang->harga;
            $detailtransaksi->jumlah = $keranjang->jumlah;
            $detailtransaksi->diskon = $keranjang->diskon;
            $detailtransaksi->total = $keranjang->total;
            $detailtransaksi->save();

            //Update Stok
            $produk = Produk::findOrFail($keranjang->id_produk);
            $stokawal = $produk->stok;

            if($jenistrans == 'pembelian'){
                $stokakhir = $stokawal + $keranjang->jumlah;
                $produk->stok = $stokakhir;
                $produk->update();
            }
            //Update stok Cabang
            else if($jenistrans == 'kirimcabang'){
                $stokakhir = $stokawal - $keranjang->jumlah;
                $produkcabang = StockCabang::where('id_produk',$keranjang->id_produk)->where('id_profile',$request->id_customer)->get();
                foreach($produkcabang as $produk2){
                    $stokawal2 = $produk2->stok;
                    $stokakhir2 = $stokawal2 + $keranjang->jumlah;
                    $produk2->stok = $stokakhir2;
                    $produk2->update();
                }
                $produk->stok = $stokakhir;
                $produk->update();
            }
            else{
                if($request->statustoko == 'pusat'){
                    $stokakhir = $stokawal - $keranjang->jumlah;
                    $produk->stok = $stokakhir;
                    $produk->update();
                }
                else if($request->statustoko == 'cabang'){
                    $produkcabang = StockCabang::where('id_produk',$keranjang->id_produk)->where('id_profile',$request->id_profile)->get();
                    foreach($produkcabang as $produk2){
                        $stokawal2 = $produk2->stok;
                        $stokakhir2 = $stokawal2 - $keranjang->jumlah;
                        $produk2->stok = $stokakhir2;
                        $produk2->update();
                    }
                }
            }
            //Hapus Keranjang
            $keranjang->delete();
        }
        return $transaksi;
    }
    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $transaksi = Transaksi::findOrFail($id);
        $input = $request->all();
        $transaksi->update($input);
        return $transaksi;
    }
    public function cari(Request $request){
        $kata_kunci = $request->input('kodetransaksi');
        $jenis = $request->input('jenistransaksi');
        //Query
        $data = Transaksi::where('kodetransaksi', 'LIKE', '%' . $kata_kunci . '%')
        ->where('jenistransaksi', $jenis)->orderBy('id', 'asc')->get();
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
    public function destroy($id){
        settype($id, "integer");
        $transaksi = Transaksi::findOrFail($id);
        $jenistrans = $transaksi->jenistransaksi;
        $detailtransaksi = DetailTransaksi::where('id_transaksi', $id)->get();
        foreach($detailtransaksi as $detail){
            //Update Stok
            $produk = Produk::findOrFail($detail->id_produk);
            $stokawal = $produk->stok;
            if($jenistrans == 'pembelian'){
                $stokakhir = $stokawal - $detail->jumlah;
            }
            //Update stok Cabang
            else if($jenistrans == 'kirimcabang'){
                $stokakhir = $stokawal + $detail->jumlah;
                $produkcabang = StockCabang::where('id_produk',$detail->id_produk)->where('id_profile',$request->id_cabang)->get();
                foreach($produkcabang as $produk2){
                    $stokawal2 = $produk2->stok;
                    $stokakhir2 = $stokawal2 - $detail->jumlah;
                    $produk2->stok = $stokakhir2;
                    $produk2->update();
                }
            }
            else{
                $stokakhir = $stokawal + $detail->jumlah;
            }
            $produk->stok = $stokakhir;
            $produk->update();
        }
        $transaksi->delete();
        return $transaksi;
    }
    public function lunas(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->bayar = $transaksi->subtotal;
        $transaksi->sisa = 0;
        $transaksi->kembali = 0;
        $transaksi->status = "lunas";
        $transaksi->statustransaksi = "sudah";
        $transaksi->update();
        return $transaksi;
    }
    public function batal(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $transaksi = Transaksi::findOrFail($id);
        //$transaksi->status = "belum";
        $transaksi->statustransaksi = "batal";
        $transaksi->bayar = 0;
        $transaksi->sisa = 0;
        $transaksi->kembali = 0;
        $transaksi->update();
        return $transaksi;
    }
    public function cart($idkaryawan,$jenis){
        $data = Keranjang::where('id_karyawan', $idkaryawan)->where('jenistransaksi', $jenis)
        ->with('produk.merk')->orderBy('id', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $keranjang = collect($data);
            $keranjang->toJson();
            return $keranjang;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $keranjang = collect($data);
            $keranjang->toJson();
            return $keranjang;
        }
    }
    public function addcart(Request $request){
        $data = Keranjang::where('id_karyawan', $request->id_karyawan)->where('jenistransaksi', $request->jenistransaksi)
        ->where('id_produk', $request->id_produk)->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            //EDIT
        }
        else{
            //SIMPAN BARU
            $input = $request->all();
            $cart = Keranjang::create($input);
            return $cart;
        }
    }
    public function updatecart(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $cart = Keranjang::findOrFail($id);
        $input = $request->all();
        $cart->update($input);
        return $cart;
    }
    public function destroycart($id){
        settype($id, "integer");
        $cart = Keranjang::findOrFail($id);
        $cart->delete();
        return $cart;
    }
}
