<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer',
        'reading_time_minutes' => 'integer',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag')
            ->withPivot('created_at');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(BlogPostImage::class, 'blog_post_id')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query
            ->whereRaw('LOWER(' . $this->getTable() . '.status) = ?', ['active'])
            ->where(function ($query) {
                $query->whereNull($this->getTable() . '.published_at')
                    ->orWhere($this->getTable() . '.published_at', '<=', now());
            });
    }

    public function getPrimaryTagAttribute(): ?BlogTag
    {
        return $this->tags->first();
    }

    public function getPublishedDateAttribute(): string
    {
        $date = $this->published_at ?: $this->created_at;

        return $date ? Carbon::parse($date)->format('d M Y') : '';
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if (!empty($this->featured_image)) {
            return backend_image($this->featured_image);
        }

        if ($this->relationLoaded('images') && $this->images->isNotEmpty()) {
            return $this->images->first()->image_url;
        }

        return asset('build/img/blog/blog-01.jpg');
    }

    public function getAuthorImageUrlAttribute(): string
    {
        if (!empty($this->author_image)) {
            return backend_image($this->author_image);
        }

        return asset('build/img/users/user-01.jpg');
    }

    public function getAuthorDisplayNameAttribute(): string
    {
        return $this->author_name ?: 'Skyeagle Team';
    }

    public function getExcerptTextAttribute(): string
    {
        return trim(strip_tags($this->excerpt ?: Str::limit(strip_tags($this->content), 180)));
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->category?->name ?: 'Travel';
    }
}
