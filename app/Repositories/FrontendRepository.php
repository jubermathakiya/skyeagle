<?php

namespace App\Repositories;

use App\Models\Media;

class FrontendRepository
{
    
    public function getHomeMedia()
    {
        return Media::with('images')
        ->where('module', 'Home')
        ->where('is_active', 1)
        ->first();
    }
}