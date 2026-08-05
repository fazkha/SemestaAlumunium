<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPerawatan extends Model
{
    protected $guarded = [];
    protected $table = 'jenis_perawatans';

    protected $fillable = [
        'nama',
        'keterangan',
        'isactive',
    ];
}
