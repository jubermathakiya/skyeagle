<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageAttribute extends Model
{
    use SoftDeletes;

    protected $table = 'package_attributes';

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            Toures::class,
            'package_attribute_package',
            'package_attribute_id',
            'package_id'
        )->withTimestamps();
    }
}
