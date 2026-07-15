<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcAverageOmzet extends Model
{
    protected $guarded = [];
    protected $table = 'pc_average_omzets';
    protected $connection = 'mysql2';

    protected $fillable = [
        'branch_id',
        'user_id',
        'target_id',
        'product_id',
        'tahun',
        'bulan',
        'hpp',
        'rata2',
        'trend',
        'pct',
        'bonus',
        'trend_bonus',
        'pct_bonus',
    ];
}
