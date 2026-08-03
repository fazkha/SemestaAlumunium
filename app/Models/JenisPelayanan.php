<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelayanan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'jenis_pelayanans';

    protected $fillable = [
        'nama',
        'kode',
        'isactive',
    ];
}
