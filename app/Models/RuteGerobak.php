<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuteGerobak extends Model
{
    protected $guarded = [];
    protected $table = 'rute_gerobaks';
    protected $connection = 'mysql2';

    protected $fillable = [
        'user_id',
        'product_id',
        'tanggal',
        'status',
        'latitude',
        'longitude',
        'isactive',
        'timesaved',
    ];
}
