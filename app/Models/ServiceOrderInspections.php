<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderInspections extends Model
{
    protected $guarded = [];
    protected $table = 'service_order_inspections';

    protected $fillable = [
        'service_order_id',
        'branch_id',
        'urutan',
        'std_inspect_nama',
        'ischeck',
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
}
