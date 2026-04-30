<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'tour_details_id',
        'name',
        'email',
        'phone',
        'message',
        'source',
        'ip_address'
    ];
}
