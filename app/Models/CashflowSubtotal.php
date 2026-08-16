<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashflowSubtotal extends Model
{
    protected $guarded = [];
    protected $table = 'cashflow_subtotals';

    protected $fillable = [
        'cashflow_total_id',
        'product_id',
        'cashflow_id',
        'tahun',
        'bulan',
        'nominal',
        'isclosed',
    ];

    public function kelompok()
    {
        return $this->belongsTo(Cashflow::class, 'cashflow_id');
    }
}
