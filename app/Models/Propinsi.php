<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model
{
    protected $guarded = [];
    protected $table = 'propinsis';
    protected $connection = 'mysql';

    protected $fillable = [
        'nama',
        'keterangan',
        'isactive',
        'created_by',
        'updated_by',
    ];
}
