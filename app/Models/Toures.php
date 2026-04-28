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
}
