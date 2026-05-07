<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTemp extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'otp',
        'otp_expires_at',
        'verified_at',
        'attempt_count',
        'last_otp_sent_at',
        'ip_address',
        'user_agent',
    ];
    protected $casts = [
        'otp_expires_at' => 'datetime',
        'verified_at' => 'datetime',
        'last_otp_sent_at' => 'datetime',
    ];
}
