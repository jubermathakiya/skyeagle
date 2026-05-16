<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    public $timestamps = false;

    public function getTable(): string
    {
        return config('geo.states_table', 'states');
    }

    public function getDisplayNameAttribute(): string
    {
        $col = config('geo.state_name_column', 'name');

        return (string) ($this->getAttribute($col) ?? '');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, config('geo.state_country_id_column', 'country_id'));
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, config('geo.city_state_id_column', 'state_id'));
    }
}
