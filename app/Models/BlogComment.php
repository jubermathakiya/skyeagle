<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComment extends Model
{
    use SoftDeletes;

    protected $table = 'blog_comments';

    protected $fillable = [
        'blog_post_id',
        'parent_id',
        'user_id',
        'name',
        'email',
        'message',
        'status',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function blogPost(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')
            ->whereRaw('LOWER(status) = ?', ['approved'])
            ->oldest();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeApproved($query)
    {
        return $query->whereRaw('LOWER(status) = ?', ['approved']);
    }

    public function getAuthorNameAttribute(): string
    {
        return $this->user?->name ?: $this->name;
    }

    public function getAuthorImageUrlAttribute(): ?string
    {
        return $this->user?->profile_photo_url;
    }
}
