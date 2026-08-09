<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderPerawatan extends Model
{
    protected $guarded = [];
    protected $table = 'service_order_perawatans';

    protected $fillable = [
        'service_order_id',
        'branch_id',
        'barang_id',
        'satuan_id',
        'jenis_perawatan_id',
        'nama_perawatan',
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

    public function jenis_perawatan()
    {
        return $this->belongsTo(JenisPerawatan::class);
    }
}
