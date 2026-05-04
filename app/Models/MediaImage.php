<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaImage extends Model
{
    protected $table = 'media_images';
    
    public function getImageUrlAttribute()
    {
        return backend_image($this->file_path);
    }

    
}
