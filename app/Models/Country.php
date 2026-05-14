<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    public $timestamps = false;

    public function getTable(): string
    {
        return config('geo.countries_table', 'countries');
    }

    public function getDisplayNameAttribute(): string
    {
        $col = config('geo.country_name_column', 'name');

        return (string) ($this->getAttribute($col) ?? '');
    }

    public function states(): HasMany
    {
        return $this->hasMany(State::class, config('geo.state_country_id_column', 'country_id'));
    }
}
