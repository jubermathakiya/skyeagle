<?php

namespace App\Repositories;

use App\Mail\NewsletterSubscribedMail;
use App\Models\CustomerReview;
use App\Models\Media;
use App\Models\NewsletterSubscriber;

use Illuminate\Support\Facades\Mail;

class FrontendRepository
{
    
    public function getHomeMedia()
    {
        return Media::with('images')
        ->where('module', 'Home')
        ->where('is_active', 1)
        ->first();
    }

    public function getCustomerReviews()
    {
        return CustomerReview::query()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->limit(5)
            ->get()
            ->sortBy('sort_order')
            ->values();
    }

    public function alreadySubscribed(string $email): bool
    {
        return NewsletterSubscriber::query()
            ->where('email', $email)
            ->exists();
    }

    public function subscribeNewsletter(string $email): NewsletterSubscriber
    {
        $subscriber = NewsletterSubscriber::create([
            'email' => $email,
            'subscribed_at' => now(),
        ]);
        $media = Media::with([
            'images' => function ($query) {
                $query->where('is_active', 1)
                    ->orderBy('sort_order', 'asc');
            }
        ])
        ->where('module', 'Newsletter Subscribe')
        ->where('is_active', 1)
        ->latest('id')
        ->first();
        
        $bannerImage = null;
        if ($media && $media->images->isNotEmpty()) {
            $filePath = $media->images->first()->file_path;
            $bannerImage = config('constants.email_media_url'). '/storage/'. ltrim($filePath, '/');
        }
        Mail::to($email)->queue(
            new NewsletterSubscribedMail($email, $bannerImage)
        );
        return $subscriber;
    }
}