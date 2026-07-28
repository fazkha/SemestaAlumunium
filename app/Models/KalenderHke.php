<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalenderHke extends Model
{
    protected $guarded = [];
    protected $table = 'kalender_hkes';
    protected $connection = 'mysql';

    protected $fillable = [
        'tanggal',
        'hari',
        'hke'
    ];
}
