<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourReviewRequest;
use App\Models\CustomerReview;
use App\Models\Toures;
use Illuminate\Support\Facades\Log;

class TourReviewController extends Controller
{
    public function store(StoreTourReviewRequest $request, Toures $tour)
    {
        try {
            CustomerReview::query()->create([
                'package_id' => $tour->id,
                'review_title' => null,
                'review_description' => $request->input('review'),
                'reviewer_name' => $request->input('name'),
                'reviewer_email' => $request->input('email'),
                'rating' => (int) $request->input('rating'),
                'sort_order' => 0,
                'is_active' => true,
            ]);

            $tour->load([
                'reviews' => function ($query) {
                    $query->active()
                        ->orderByDesc('created_at')
                        ->orderByDesc('id');
                },
            ])->loadCount([
                'reviews as active_reviews_count' => fn ($query) => $query->active(),
            ])->loadAvg([
                'reviews as active_reviews_avg_rating' => fn ($query) => $query->active(),
            ], 'rating');

            $reviewCount = package_review_count($tour);
            $reviewRating = package_review_rating($tour);

            return response()->json([
                'status' => true,
                'message' => 'Review submitted successfully.',
                'html' => view('pages.toures.partials.reviews', [
                    'packageDetails' => $tour,
                    'reviewCount' => $reviewCount,
                    'reviewRating' => $reviewRating,
                ])->render(),
                'reviewCount' => $reviewCount,
                'reviewRating' => $reviewRating,
                'reviewCountText' => review_count_text($reviewCount),
            ]);
        } catch (\Throwable $e) {
            Log::error('Tour Review Store Error: ' . $e->getMessage(), [
                'package_id' => $tour->id,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again!',
            ], 500);
        }
    }
}
