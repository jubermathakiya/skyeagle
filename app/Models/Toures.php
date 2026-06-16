<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toures extends Model
{
    use SoftDeletes;
    
    protected $table = 'packages';
    protected $appends = ['duration'];

    public function getDurationAttribute()
    {
        if (!$this->start_date || !$this->end_date) {
            return null;
        }
        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);
        $days = $start->diffInDays($end) + 1;
        $nights = $days - 1;
        return [
            'days' => $days,
            'nights' => $nights,
            'text' => "{$nights} Nights,{$days} Days"
        ];
    }

    public function getMapLocationQueryAttribute(): string
    {
        if (filled($this->destination_city)) {
            return trim((string) $this->destination_city);
        }

        if (filled($this->source_city)) {
            return trim((string) $this->source_city);
        }

        return '';
    }

    public function getMapEmbedUrlAttribute(): ?string
    {
        $query = $this->map_location_query;

        if ($query === '') {
            return null;
        }

        return 'https://www.google.com/maps?q=' . urlencode($query) . '&output=embed';
    }

    public function images()
    {
        return $this->hasMany(PackageImage::class, 'package_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function faqs()
    {
        return $this->hasMany(PackageFaqs::class, 'package_id');
    }

    public function highlights()
    {
        return $this->hasMany(PackageHighlight::class, 'package_id');
    }

    public function itinerary()
    {
        return $this->hasMany(PackageItinerary::class, 'package_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'package_id');
    }
}
