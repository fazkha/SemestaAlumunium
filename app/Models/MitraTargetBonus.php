<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraTargetBonus extends Model
{
    protected $guarded = [];
    protected $table = 'mitra_target_bonuses';
    protected $connection = 'mysql2';

    protected $fillable = [
        'product_id',
        'target',
        'bonus',
        'isactive',
    ];
}
