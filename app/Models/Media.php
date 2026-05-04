<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    public function images()
    {
        return $this->hasMany(MediaImage::class, 'media_id');
    }
}
