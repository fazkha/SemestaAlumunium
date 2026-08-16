<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    protected $guarded = [];
    protected $table = 'cashflows';

    protected $fillable = [
        'cashflow_group_id',
        'nama',
        'kode',
        'group',
        'urutan',
        'isactive',
    ];

    public function group()
    {
        return $this->belongsTo(CashflowGroup::class);
    }
}
