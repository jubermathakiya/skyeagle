<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'country',
        'city',
        'banner_image',
        'description',
        'best_time_to_visit',
        'popular_attractions',
        'faqs',
        'status',
        'created_by',
    ];

    protected $casts = [
        'popular_attractions' => 'array',
        'faqs' => 'array',
        'status' => 'boolean',
    ];

    public function packages(): HasMany
    {
        return $this->hasMany(Toures::class, 'destination_id');
    }

    public function getBannerImageUrlAttribute(): ?string
    {
        return backend_image($this->banner_image);
    }

    public function getLocationNameAttribute(): string
    {
        return collect([$this->city, $this->country])
            ->filter()
            ->implode(', ');
    }

    public function getMapEmbedUrlAttribute(): ?string
    {
        $query = $this->location_name ?: $this->name;

        if (trim($query) === '') {
            return null;
        }

        return 'https://www.google.com/maps?q=' . urlencode($query) . '&output=embed';
    }
}
