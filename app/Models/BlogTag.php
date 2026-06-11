<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogTag extends Model
{
    protected $table = 'blog_tags';

    protected $casts = [
        'status' => 'boolean',
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tag')
            ->withPivot('created_at');
    }

    public function scopeActive($query)
    {
        return $query->where($this->getTable() . '.status', 1);
    }
}
