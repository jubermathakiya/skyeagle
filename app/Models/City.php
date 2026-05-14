<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    public $timestamps = false;

    public function getTable(): string
    {
        return config('geo.cities_table', 'cities');
    }

    public function getDisplayNameAttribute(): string
    {
        $col = config('geo.city_name_column', 'name');

        return (string) ($this->getAttribute($col) ?? '');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, config('geo.city_state_id_column', 'state_id'));
    }
}
