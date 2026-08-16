<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashflowGroup extends Model
{
    protected $guarded = [];
    protected $table = 'cashflow_groups';

    protected $fillable = [
        'nama',
        'urutan',
        'isactive',
    ];
}
