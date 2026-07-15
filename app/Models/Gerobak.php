<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerobak extends Model
{
    protected $guarded = [];
    protected $table = 'gerobaks';
    protected $connection = 'mysql2';

    protected $fillable = [
        'kode',
        'nama',
    ];
}
