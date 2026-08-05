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
        'nama_perawatan',
        'harga_satuan',
        'kuantiti',
        'keterangan',
        'lokasi',
        'gambar',
        'created_by',
        'updated_by',
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
}
