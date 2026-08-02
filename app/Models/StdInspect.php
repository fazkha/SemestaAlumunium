<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StdInspect extends Model
{
    protected $guarded = [];
    protected $table = 'std_inspects';

    protected $fillable = [
        'urutan',
        'standar',
        'isactive',
    ];
}
