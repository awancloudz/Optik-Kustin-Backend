<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProdukRequest;
use App\Produk;
use App\StockCabang;
use App\KategoriProduk;
use App\Profile;
use App\Merk;
use Storage;

class ProdukController extends Controller
{
    public function index(){
        $data = Produk::orderBy('id_merk', 'asc')
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

    public function category($cat){
        $mencari = 0;
        $data = Produk::where('id_kategoriproduk',$cat)->orderBy('id_merk', 'asc')
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

        if($request->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($request);
        }
        else{
            $input['foto'] = "box-flat.png";
        }
        
        //Simpan Data produk
        $produk = Produk::create($input);
        $cabang = Profile::where('statustoko','=','cabang')->get();
        foreach($cabang as $cab){
            $stockcabang = new StockCabang;
            $stockcabang->id_produk = $produk->id;
            $stockcabang->id_profile = $cab->id;
            $stockcabang->hargajual = $produk->hargajual;
            $stockcabang->stok = 0;
            $stockcabang->save();
        }
        return $produk;
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $produk = Produk::findOrFail($id);
        $input = $request->all();
        if($request->hasFile('foto')){
            $this->hapusFoto($produk);
            $input['foto'] = $this->uploadFoto($request);
        }
        $produk->update($input);
        return $produk;
    }
    
    //Upload foto ke direktori lokal
    public function uploadFoto(Request $request){
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();

        if($request->file('foto')->isValid()){
            $foto_name = date('YmdHis'). ".$ext";
            $upload_path = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);
            return $foto_name;
        }
        return false;
    }

    //Hapus foto di direktori lokal
    public function hapusFoto(Produk $produk){
        $exist = Storage::disk('foto')->exists($produk->foto);
        if(isset($produk->foto) && $exist){
           $delete = Storage::disk('foto')->delete($produk->foto);
           if($delete){
            return true;
           }
           return false;
        }
    }

    public function destroy($id){
        settype($id, "integer");
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return $produk;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('kodeproduk');
        //Query
        $data = Produk::where(function($query) use ($kata_kunci) {
            $query->where('kodeproduk', 'LIKE', '%'.$kata_kunci.'%')
            ->orWhere('namaproduk', 'LIKE', '%'.$kata_kunci.'%')
            ->orWhere('seriproduk', 'LIKE', '%'.$kata_kunci.'%');
        })->with('merk')->with('kategoriproduk')->orderBy('id_merk', 'asc')->get();
            
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
    public function caribarcode(Request $request){
        $kata_kunci_barcode = $request->input('kodeproduk');
        $data = Produk::where('kodeproduk',$kata_kunci_barcode)->get();
        $produk = collect($data);
        $produk->toJson();
        return $produk;
    }
    public function caribarcodecabang(Request $request){
        $kata_kunci_barcode = $request->input('kodeproduk');
        $produkpusat = Produk::where('kodeproduk',$kata_kunci_barcode)->get();
        $jumlah = $produkpusat->count();
        if($jumlah > 0){
            foreach($produkpusat as $produk){
                $idproduk = $produk->id;
            }
            $stockcabang = StockCabang::where('id_produk',$idproduk)->where('id_profile', $request->id)->get();
            $data = [];
            foreach($stockcabang as $cabang){
                $data = [
                    [
                    'id' => $cabang->id_produk, 
                    'kodeproduk' => $kata_kunci_barcode,
                    'id_kategoriproduk' => $cabang->produk->kategoriproduk->id,
                    'id_merk' => $cabang->produk->merk->id,
                    'namaproduk' => $cabang->produk->namaproduk,
                    'seriproduk' => $cabang->produk->seriproduk,
                    'hargajual' => $cabang->hargajual,
                    'hargagrosir' => $cabang->produk->hargagrosir,
                    'hargadistributor' => $cabang->produk->hargadistributor,
                    'diskon' => $cabang->produk->diskon,
                    'stok' => $cabang->stok,
                    ],
                ];
            }
            $produkcabang = collect($data);
            $produkcabang->toJson();
            return $produkcabang;
        }
        else{
            return $produkpusat;
        }
    }
    //Kategori Produk
    public function kategori($cat)
    {   
        $mencari = 1;
        $produk_list = Produk::where('id_kategoriproduk',$cat)->orderBy('kodeproduk', 'asc')->paginate(10);
        $jumlah_produk = $produk_list->count();
        $kategorinya = KategoriProduk::all();
        return view('produk.index', compact('produk_list','jumlah_produk','kategorinya','cat','mencari'));
    }
    //Cetak Produk
    public function getPdf(Produk $produk)
    {
        $profiletoko = Profile::all();
        //$pdf = PDF::loadView('produk.pdf',compact('produk'))->setPaper('a4','portrait');
        $pdf = PDF::loadView('produk.print',compact('produk','profiletoko'))->setPaper(array(0,0,113.39,166.30),'landscape');
        return $pdf->stream();
    }
    //Import Excel
    public function importExcel(Request $request)
    {
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['id'=>'' ,'kodeproduk' => $value->kodeproduk ,'jenisproduk'=>'' ,'id_distributor'=>'1' ,'id_kategoriproduk'=>$request->cat1 ,'namaproduk' => $value->namaproduk ,'seriproduk' => $value->seriproduk ,'hargajual' => $value->hargajual ,'hargagrosir' => $value->hargagrosir ,'hargadistributor' => $value->hargadistributor ,'diskon'=> $value->diskon ,'stok'=> $value->stok ,'foto'=>''];
                }
                if(!empty($insert)){
                    DB::table('produk')->insert($insert);
                    Session::flash('flash_message', 'Import Data Produk Berhasil');
                }
            }
            else{
                Session::flash('flash_message', 'Data Kosong');
            }
        }
        else{
            Session::flash('flash_message', 'Silahkan Pilih File Excel (.xlsx / .xls / .csv) terlebih dahulu');
        }
        return back();
    }
    //Export Excel
    public function exportExcel($type)
    {
        $data = Produk::get()->toArray();
        return Excel::create('Data Produk', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
