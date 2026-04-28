<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageHighlight extends Model
{
    protected $table = 'package_highlights';
    protected $fillable = ['package_id', 'highlight'];
}
