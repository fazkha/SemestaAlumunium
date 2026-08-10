<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderGantibaru extends Model
{
    protected $guarded = [];
    protected $table = 'service_order_gantibarus';

    protected $fillable = [
        'service_order_id',
        'branch_id',
        'barang_id',
        'satuan_id',
        'jenis_gantibaru_id',
        'nama_gantibaru',
        'harga_satuan',
        'pajak',
        'kuantiti',
        'stock',
        'keterangan',
        'lokasi',
        'gambar',
        'created_by',
        'updated_by',
        'approved',
        'approved_by',
        'approved_at',
    ];

    public function service_order()
    {
        return $this->belongsTo(ServiceOrder::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function jenis_gantibaru()
    {
        return $this->belongsTo(JenisGantibaru::class);
    }
}
