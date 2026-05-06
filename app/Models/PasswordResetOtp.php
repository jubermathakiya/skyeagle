<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetOtp extends Model
{
    protected $fillable = [
        'user_id', 'email', 'otp', 'otp_expires_at',
        'attempt_count', 'last_otp_sent_at', 'verified_at'
    ];
    protected $casts = [
        'otp_expires_at' => 'datetime',
        'last_otp_sent_at' => 'datetime',
        'verified_at' => 'datetime',
    ];
}
