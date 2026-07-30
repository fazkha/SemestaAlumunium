<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderDetail extends Model
{
    protected $guarded = [];
    protected $table = 'service_order_details';
    protected $connection = 'mysql';

    protected $fillable = [
        'service_order_id',
        'branch_id',
        'barang_id',
        'satuan_id',
        'kuantiti',
        'stock',
        'harga_satuan',
        'keterangan',
        'pajak',
        'ispackaged',
        'ispackaged_by',
        'ispackaged_at',
        'approved',
        'approved_by',
        'approved_at',
        'cust_received',
        'cust_note',
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

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
