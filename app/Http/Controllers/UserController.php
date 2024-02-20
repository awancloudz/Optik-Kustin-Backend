<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Hash;

class UserController extends Controller
{
    public function index(){
        $data = User::orderBy('name', 'asc')->with('profile')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $user = collect($data);
            $user->toJson();
            return $user;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $user = collect($data);
            $user->toJson();
            return $user;
        }
    }

    public function store(Request $request){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return $user;
    }
    
    public function update(Request $request){
        $item = $request->id;
        settype($item, "integer");
        $user = User::findOrFail($item);
        $input = $request->all();
        if($request->password != ''){
            $input['password'] = bcrypt($input['password']);
        }
        $user->update($input);
        return $user;
    }

    public function destroy($id){
        settype($id, "integer");
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }

    public function cari(Request $request){
        $kata_kunci = $request->input('name');
        //Query
        $data = User::where('name', 'LIKE', '%' . $kata_kunci . '%')->with('profile')
        ->orderBy('name', 'asc')->get();
        $jumlah = $data->count();
        if($jumlah > 0){
            $user = collect($data);
            $user->toJson();
            return $user;
        }
        else{
            $data = [
                ['id' => null],
            ];
            $user = collect($data);
            $user->toJson();
            return $user;
        }
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $userlogin = User::where('username', '=', $username)->with('profile')->get();
        $userlogin->makeVisible('password')->toArray();

        //Verifikasi Password
        $jumlahuser = $userlogin->count();
        if($jumlahuser == 0){
            $data = [
            ['username' => null, 'password' => null],
            ];   
            $kosong = collect($data);
            $kosong->toJson();
            return $kosong;
        }
        else{
            //Cek Password HASH
            foreach($userlogin as $user){
                $passwordhash = $user->password;
            }
            if (Hash::check($password, $passwordhash)) {
                $koleksi = collect($userlogin);
                $koleksi->toJson();
                return $koleksi;
            }
            else{
                $data = [
                ['username' => null, 'password' => null],
                ];   
                $kosong = collect($data);
                $kosong->toJson();
                return $kosong; 
            }
        }
    }
}
