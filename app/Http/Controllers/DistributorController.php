<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Requests\DistributorRequest;
use App\Distributor;
use App\Customer;
use Session;

class DistributorController extends Controller
{
    public function index(){
        $data = Customer::orderBy('nama', 'asc')->where('jenis','=','distributor')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $distributor = collect($data);
            $distributor->toJson();
            return $distributor;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $distributor = collect($data);
            $distributor->toJson();
            return $distributor;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $distributor = Customer::create($input);
        return $distributor;
    }
    
    public function show($id){
        $data = Customer::findOrFail($id);
        $jumlah = $data->count();
        if($jumlah > 0){
            $distributor = collect($data);
            $distributor->toJson();
            return $distributor;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $distributor = collect($data);
            $distributor->toJson();
            return $distributor;
        }
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $distributor = Customer::findOrFail($id);
        $input = $request->all();
        $distributor->update($input);
        return $distributor;
    }

    public function destroy($id){
        settype($id, "integer");
        $distributor = Customer::findOrFail($id);
        $distributor->delete();
        return $distributor;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('nama');
        //if(!empty($kata_kunci)){
            //Query
            $data = Customer::where('nama', 'LIKE', '%' . $kata_kunci . '%')->where('jenis','=','distributor')
            ->orderBy('nama', 'asc')->get();
            $jumlah = $data->count();
            if($jumlah > 0){
                $distributor = collect($data);
                $distributor->toJson();
                return $distributor;
            }
            else{
                $data = [
                    ['id' => null],
                ];
                $distributor = collect($data);
                $distributor->toJson();
                return $distributor;
            }
        //}
        //else{
        //    return $request;
        //}
    }
}
