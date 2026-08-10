<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisGantibaru extends Model
{
    protected $guarded = [];
    protected $table = 'jenis_gantibarus';

    protected $fillable = [
        'nama',
        'keterangan',
        'isactive',
    ];
}
