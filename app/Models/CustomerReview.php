<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerReview extends Model
{
    use SoftDeletes;

    protected $table = 'customer_reviews';

    protected $fillable = [
        'package_id',
        'review_title',
        'review_description',
        'reviewer_name',
        'reviewer_email',
        'reviewer_phone',
        'reviewer_designation',
        'reviewer_company',
        'reviewer_location',
        'reviewer_image',
        'rating',
        'sort_order',
        'is_active',
        'slug',
    ];

    protected $casts = [
        'rating' => 'float',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Toures::class, 'package_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
