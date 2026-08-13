<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $guarded = [];
    protected $table = 'notifs';

    protected $fillable = [
        'title',
        'message',
        'tanggal_awal',
        'tanggal_akhir',
        'tema',
        'tabel',
        'row_id',
        'penting',
        'isactive',
        'created_by',
        'updated_by',
    ];
}
