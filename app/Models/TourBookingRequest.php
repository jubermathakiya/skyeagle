<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourBookingRequest extends Model
{
    use SoftDeletes;

    public const STATUS_PENDING = 'pending';
    public const STATUS_CONTACTED = 'contacted';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'package_id',
        'user_id',
        'name', 
        'email',
        'phone',
        'travel_from_date',
        'travel_to_date',
        'adults',
        'children',
        'infants',
        'special_request',
        'estimated_price',
        'currency',
        'package_name_snapshot',
        'package_code_snapshot',
        'package_price_snapshot',
        'status',
        'admin_note',
        'source',
        'ip_address',
    ];

    protected $casts = [
        'travel_from_date' => 'date',
        'travel_to_date' => 'date',
        'adults' => 'integer',
        'children' => 'integer',
        'infants' => 'integer',
        'estimated_price' => 'decimal:2',
        'package_price_snapshot' => 'decimal:2',
    ];

    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_CONTACTED,
            self::STATUS_CONFIRMED,
            self::STATUS_CANCELLED,
        ];
    }

    public static function statusOptions(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_CONTACTED => 'Contacted',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_CANCELLED => 'Cancelled',
        ];
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Toures::class, 'package_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPackageNameAttribute(): ?string
    {
        return $this->package?->package_name ?? $this->package_name_snapshot;
    }

    public function getPackageSlugAttribute(): ?string
    {
        return $this->package?->slug;
    }

    public function getSourceCityAttribute(): ?string
    {
        return $this->package?->source_city;
    }

    public function getDestinationCityAttribute(): ?string
    {
        return $this->package?->destination_city;
    }

    public function getStatusLabelAttribute(): string
    {
        return self::statusOptions()[$this->status] ?? 'Pending';
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_CONTACTED => 'badge-info',
            self::STATUS_CONFIRMED => 'badge-success',
            self::STATUS_CANCELLED => 'badge-danger',
            default => 'badge-warning',
        };
    }

    public function getTotalTravellersAttribute(): int
    {
        return (int) $this->adults + (int) $this->children + (int) $this->infants;
    }
}
