<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Toures extends Model
{
    protected $table = 'packages';
    protected $appends = ['duration']; // IMPORTANT

    public function sourceCity()
    {
        return $this->belongsTo(City::class, 'source_city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

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
            'text' => "{$days} Days, {$nights} Nights"
        ];
    }

    public function images()
    {
        return $this->hasMany(PackageImage::class, 'package_id');
    }
}
