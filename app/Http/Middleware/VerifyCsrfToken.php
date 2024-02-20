<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'distributor',
        'distributor/cari',
        'distributor/hapus',
        'karyawan',
        'karyawan/cari',
        'karyawan/hapus',
        'customer',
        'customer/resep',
        'customer/reseptransaksi',
        'customer/cari',
        'customer/hapus',
        'kategoriproduk',
        'kategoriproduk/cari',
        'kategoriproduk/hapus',
        'merk',
        'merk/kategori',
        'merk/cari',
        'merk/hapus',
        'stok-pusat',
        'stok-pusat/kategori',
        'stok-pusat/cari',
        'stok-pusat/caribarcode',
        'stok-pusat/caribarcodecabang',
        'stok-pusat/hapus',
        'semuatoko',
        'pusat',
        'cabang',
        'cabang/cari',
        'cabang/hapus',
        'cabang/stok',
        'cabang/stok/cari',
        'cabang/transaksi',
        'user',
        'user/login',
        'user/cari',
        'user/hapus',
        'transaksi',
        'transaksi/hapus',
        'transaksi/view',
        'transaksi/cari',
        'transaksi/lunas',
        'transaksi/batal',
        'transaksi/keranjang',
        'transaksi/keranjang/hapus',
        'laporan',
    ];
}
