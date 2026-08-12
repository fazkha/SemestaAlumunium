<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $guarded = [];
    protected $table = 'pengaduans';

    protected $fillable = [
        'branch_id',
        'user_id',
        'product_id',
        'tanggal',
        'aduan',
        'isactive',
        'lokasi',
        'gambar',
        'created_by',
        'updated_by',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
