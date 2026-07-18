<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidangusaha extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bidangusahas';
    protected $connection = 'mysql';

    protected $fillable = [
        'propinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kode',
        'nama',
        'alamat',
        'kodepos',
        'keterangan',
        'email',
        'latitude',
        'longitude',
        'isactive',
        'created_by',
        'updated_by',
    ];

    public function propinsi()
    {
        return $this->belongsTo(Propinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
