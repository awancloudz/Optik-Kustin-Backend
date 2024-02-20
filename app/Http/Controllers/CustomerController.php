<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Resep;

class CustomerController extends Controller
{
    public function index(){
        $data = Customer::orderBy('nama', 'asc')->where('jenis','=','customer')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $customer = collect($data);
            $customer->toJson();
            return $customer;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $customer = collect($data);
            $customer->toJson();
            return $customer;
        }
    }

    public function indexresep($idcustomer){
        $data = Resep::orderBy('created_at', 'desc')->where('id_customer', $idcustomer)->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $resep = collect($data);
            $resep->toJson();
            return $resep;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $resep = collect($data);
            $resep->toJson();
            return $resep;
        }
    }

    public function indexreseptransaksi($id){
        $data = Resep::where('id', $id)->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $resep = collect($data);
            $resep->toJson();
            return $resep;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $resep = collect($data);
            $resep->toJson();
            return $resep;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $customer = Customer::create($input);
        return $customer;
    }
    
    public function storeresep(Request $request){
        $input = $request->all();
        $resep = Resep::create($input);
        return $resep;
    }

    public function show($id){
        $data = Customer::findOrFail($id);
        $jumlah = $data->count();
        if($jumlah > 0){
            $customer = collect($data);
            $customer->toJson();
            return $customer;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $customer = collect($data);
            $customer->toJson();
            return $customer;
        }
    }

    public function update(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $customer = Customer::findOrFail($id);
        $input = $request->all();
        $customer->update($input);
        return $customer;
    }

    public function updateresep(Request $request){
        $id = $request->id;
        settype($id, "integer");
        $resep = Resep::findOrFail($id);
        $input = $request->all();
        $resep->update($input);
        return $resep;
    }

    public function destroy($id){
        settype($id, "integer");
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return $customer;
    }

    public function destroyresep($id){
        settype($id, "integer");
        $resep = Resep::findOrFail($id);
        $resep->delete();
        return $resep;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('nama');
        //Query
        $data = Customer::where('nama', 'LIKE', '%' . $kata_kunci . '%')->where('jenis','=','customer')
            ->orderBy('nama', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $customer = collect($data);
            $customer->toJson();
            return $customer;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $customer = collect($data);
            $customer->toJson();
            return $customer;
        }
    }
}
