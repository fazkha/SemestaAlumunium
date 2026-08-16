<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashflowTotal extends Model
{
    protected $guarded = [];
    protected $table = 'cashflow_totals';

    protected $fillable = [
        'product_id',
        'tahun',
        'bulan',
        'kas_awal',
        'kas_akhir',
        'isclosed',
    ];
}
