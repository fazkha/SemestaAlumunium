<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcKasbon extends Model
{
    protected $guarded = [];
    protected $table = 'pc_kasbons';
    protected $connection = 'mysql2';

    protected $fillable = [
        'user_id',
        'product_id',
        'minggu',
        'plafon',
        'sisa_plafon',
        'isactive',
    ];
}
