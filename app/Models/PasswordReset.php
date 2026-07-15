<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $guarded = [];
    protected $table = 'password_resets';
    protected $connection = 'mysql';

    protected $fillable = [
        'email',
        'otp',
        'hashed_otp',
        'expired_at',
        'verified'
    ];
}
