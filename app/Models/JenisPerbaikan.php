<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPerbaikan extends Model
{
    protected $guarded = [];
    protected $table = 'jenis_perbaikans';

    protected $fillable = [
        'nama',
        'keterangan',
        'isactive',
    ];
}
