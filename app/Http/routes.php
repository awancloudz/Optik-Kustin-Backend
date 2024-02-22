<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With, x-xsrf-token');

//A. DATA MASTER
//DISTRIBUTOR
Route::get('distributor','DistributorController@index');
Route::post('distributor','DistributorController@store');
Route::put('distributor','DistributorController@update');
Route::post('distributor/cari','DistributorController@cari');
Route::delete('distributor/hapus/{id}', 'DistributorController@destroy');

//CUSTOMER
Route::get('customer','CustomerController@index');
Route::get('customer/resep/{idcustomer}','CustomerController@indexresep');
Route::get('customer/reseptransaksi/{id}','CustomerController@indexreseptransaksi');
Route::post('customer','CustomerController@store');
Route::post('customer/resep','CustomerController@storeresep');
Route::put('customer','CustomerController@update');
Route::put('customer/resep','CustomerController@updateresep');
Route::post('customer/cari','CustomerController@cari');
Route::post('customer/cariidmember','CustomerController@cariidmember');
Route::post('customer/carinohp','CustomerController@carinohp');
Route::delete('customer/hapus/{id}', 'CustomerController@destroy');
Route::delete('customer/resep/hapus/{id}', 'CustomerController@destroyresep');

//KATEGORI PRODUK
Route::get('kategoriproduk','KategoriprodukController@index');
Route::post('kategoriproduk','KategoriprodukController@store');
Route::put('kategoriproduk','KategoriprodukController@update');
Route::post('kategoriproduk/cari','KategoriprodukController@cari');
Route::delete('kategoriproduk/hapus/{id}', 'KategoriprodukController@destroy');

//MERK
Route::get('merk','MerkController@index');
Route::get('merk/{id}','MerkController@merk');
Route::get('merk/kategori/{cat}','MerkController@kategorimerk');
Route::post('merk','MerkController@store');
Route::put('merk','MerkController@update');
Route::post('merk/cari','MerkController@cari');
Route::delete('merk/hapus/{id}', 'MerkController@destroy');

//KARYAWAN
Route::get('karyawan','KaryawanController@index');
Route::post('karyawan','KaryawanController@store');
Route::put('karyawan','KaryawanController@update');
Route::post('karyawan/cari','KaryawanController@cari');
Route::delete('karyawan/hapus/{id}', 'KaryawanController@destroy');

//PRODUK
Route::get('stok-pusat','ProdukController@index');
Route::get('stok-pusat/kategori/{cat}','ProdukController@category');
Route::post('stok-pusat','ProdukController@store');
Route::put('stok-pusat','ProdukController@update');
Route::post('stok-pusat/cari','ProdukController@cari');
Route::post('stok-pusat/caribarcode','ProdukController@caribarcode');
Route::post('stok-pusat/caribarcodecabang','ProdukController@caribarcodecabang');
Route::delete('stok-pusat/hapus/{id}', 'ProdukController@destroy');

//PUSAT
Route::get('pusat','ProfileController@indexpusat');
Route::get('semuatoko','ProfileController@indexall');
//CABANG
Route::get('cabang','ProfileController@index');
Route::post('cabang','ProfileController@store');
Route::put('cabang','ProfileController@update');
Route::post('cabang/cari','ProfileController@cari');
Route::delete('cabang/hapus/{id}', 'ProfileController@destroy');
//STOK CABANG
Route::get('cabang/transaksi/{id}','ProfileController@transaksi');
Route::get('cabang/stok/{id}','ProfileController@stok');
Route::get('cabang/stok/{id}/kategori/{idcat}','ProfileController@stokkategori');
Route::get('cabang/stok/{id}/merk/{idmerk}','ProfileController@stokmerk');
Route::post('cabang/stok/cari','ProfileController@caristok');
Route::put('cabang/stok','ProfileController@updatestok');

//PENGGUNA
Route::get('user','UserController@index');
Route::post('user','UserController@store');
Route::post('user/login','UserController@login');
Route::put('user','UserController@update');
Route::post('user/cari','UserController@cari');
Route::delete('user/hapus/{id}', 'UserController@destroy');

//TRANSAKSI
Route::get('transaksi/{jenis}/profile/{idprofile}','TransaksiController@index');
Route::get('transaksi/view/{idtrans}','TransaksiController@view');
Route::post('transaksi','TransaksiController@store');
Route::patch('transaksi','TransaksiController@update');
Route::post('transaksi/cari','TransaksiController@cari');
Route::put('transaksi/lunas','TransaksiController@lunas');
Route::put('transaksi/batal','TransaksiController@batal');
Route::delete('transaksi/hapus/{id}', 'TransaksiController@destroy');
Route::get('transaksi/keranjang/{idkaryawan}/jenis/{jenis}','TransaksiController@cart');
Route::post('transaksi/keranjang','TransaksiController@addcart');
Route::put('transaksi/keranjang','TransaksiController@updatecart');
Route::delete('transaksi/keranjang/hapus/{id}', 'TransaksiController@destroycart');

//LAPORAN
Route::get('laporan/{jenis}/profile/{idprofile}/awal/{awal}/akhir/{akhir}/status/{status}/ambil/{ambil}','LaporanController@index');