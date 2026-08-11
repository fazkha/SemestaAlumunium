<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'service_orders';
    protected $connection = 'mysql';

    protected $fillable = [
        'branch_id',
        'customer_id',
        'product_id',
        'jenis_pelayanan_id',
        'petugas_id',
        'petugas_maintenance_id',
        'petugas_repair_id',
        'petugas_replacement_id',
        'hke',
        'tanggal',
        'no_order',
        'total_harga',
        'biaya_angkutan',
        'tunai',
        'jatuhtempo',
        'pajak',
        'keterangan',
        'isactive',
        'isperawatan',
        'isperawatan_by',
        'isperawatan_at',
        'isperbaikan',
        'isperbaikan_by',
        'isperbaikan_at',
        'isgantibaru',
        'isgantibaru_by',
        'isgantibaru_at',
        'approved',
        'approved_by',
        'approved_at',
        'created_by',
        'updated_by',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Pegawai::class, 'petugas_id');
    }

    public function petugas_maintenance()
    {
        return $this->belongsTo(Pegawai::class, 'petugas_maintenance_id');
    }

    public function petugas_repair()
    {
        return $this->belongsTo(Pegawai::class, 'petugas_repair_id');
    }

    public function petugas_replacement()
    {
        return $this->belongsTo(Pegawai::class, 'petugas_replacement_id');
    }
}
