<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraAverageOmzet extends Model
{
    protected $guarded = [];
    protected $table = 'mitra_average_omzets';
    protected $connection = 'mysql2';

    protected $fillable = [
        'user_id',
        'target_id',
        'product_id',
        'minggu',
        'rata2',
        'trend',
        'pct',
        'bonus',
        'trend_bonus',
        'pct_bonus',
        'target_akum_omzet',
        'target_omzet_phari',
        'target_approved',
    ];
}
