<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    protected $table = 'package_itineraries';
    protected $fillable = ['package_id', 'day', 'title', 'description'];
}
