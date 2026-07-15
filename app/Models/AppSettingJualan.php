<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSettingJualan extends Model
{
    protected $guarded = [];
    protected $table = 'app_settings';
    protected $connection = 'mysql2';

    protected $fillable = [
        'parm',
        'value'
    ];
}
