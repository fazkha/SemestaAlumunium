<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $guarded = [];
    protected $table = 'mitras';
    protected $connection = 'mysql';

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'nik',
        'nip',
        'alamat_asal',
        'alamat_tinggal',
        'telpon',
        'kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'keterangan',
        'email',
        'isactive',
        'gambar_1_lokasi',
        'gambar_1_nama',
        'gambar_2_lokasi',
        'gambar_2_nama',
        'gambar_3_lokasi',
        'gambar_3_nama',
        'gambar_4_lokasi',
        'gambar_4_nama',
        'gambar_5_lokasi',
        'gambar_5_nama',
        'created_by',
        'updated_by',
    ];
}
