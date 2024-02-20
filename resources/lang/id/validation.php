<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        //Customer
        'nama' => [
            'required' => 'Nama Wajib Diisi',
            'max' => 'Nama maksimum 50 karakter',
        ],
        'alamat' => [
            'required' => 'Alamat Wajib Diisi',
        ],
        'notelp' => [
            'required' => 'No.Telp Wajib Diisi',
            'max' => 'No.Telp maksimum 20 karakter',
        ],

        //Distributor
        'nama_distributor' => [
            'required' => 'Nama Wajib Diisi',
            'max' => 'Nama maksimum 50 karakter',
        ],

        //Dokter
        'nama_dokter' => [
            'required' => 'Nama Wajib Diisi',
            'max' => 'Nama maksimum 50 karakter',
        ],
        'resep' => [
            'required' => 'Resep Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
        ],

        //Instansi
        'nama_instansi' => [
            'required' => 'Nama Wajib Diisi',
            'max' => 'Nama maksimum 50 karakter',
        ],
        'harga' => [
            'required' => 'Harga Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
        ],

        //Pengguna
        'name' => [
            'required' => 'Nama Wajib Diisi',
            'max' => 'Username maksimum 255 karakter',
        ],
        'level' => [
            'required' => 'Level Wajib Diisi',
            'in' => 'Level tidak valid',
        ],
        'username' => [
            'required' => 'Username Wajib Diisi',
            'max' => 'Username maksimum 255 karakter',
            'unique' => 'Username sudah ada',
        ],
        'password' => [
            'required' => 'Password Wajib Diisi',
            'confirmed' => 'Password tidak cocok dengan kolom konfirmasi password',
            'min' => 'Password minimal 6 karakter',
        ],
        'password_confirmation' => [
            'required' => 'Konfirmasi Password Wajib Diisi',
            'min' => 'Password minimal 6 karakter',
        ],

        //Produk
        'kodeproduk' => [
            'required' => 'Kode Produk Wajib Diisi',
            'max' => 'Kode Produk maksimum 5 karakter',
            'unique' => 'Kode Produk sudah ada',
        ],
        'jenisproduk' => [
            'required' => 'Jenis Produk Wajib Diisi',
            'max' => 'Jenis Produk maksimum 10 karakter',
        ],
        'id_distributor' => [
            'required' => 'Distributor Wajib Diisi',
        ],
        'id_kategoriproduk' => [
            'required' => 'Kategori Wajib Diisi',
        ],
        'namaproduk' => [
            'required' => 'Nama Produk Wajib Diisi',
            'max' => 'Nama Produk maksimum 50 karakter',
        ],
        'hargajual' => [
            'required' => 'Harga Jual Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
            'max' => 'Harga Jual maksimum 100.000.000',
        ],
        'hargagrosir' => [
            'required' => 'Harga Grosir Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
            'max' => 'Harga Grosir maksimum 100.000.000',
        ],
        'hargadistributor' => [
            'required' => 'Harga Distributor Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
            'max' => 'Harga Distributor maksimum 100.000.000',
        ],
        'diskon' => [
            'required' => 'Diskon Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
            'max' => 'Nilai diskon maksimum 100',
        ],
        'stok' => [
            'required' => 'Stok Wajib Diisi',
            'numeric' => 'Wajib diisi angka',
        ],
        'foto' => [
            'image' => 'File harus image.',
            'max' => 'Ukuran maksimum 1Mb',
            'mimes' => 'Tipe file harus .jpg,jpeg,png,bmp',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
