<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = [];
    protected $table = 'journals';

    protected $fillable = [
        'journal_no',
        'journal_date',
        'description',
        'reference_type',
        'reference_id',
        'created_by',
    ];

    protected $casts = [
        'journal_date' => 'date',
    ];

    public function details()
    {
        return $this->hasMany(JournalDetail::class);
    }
}
