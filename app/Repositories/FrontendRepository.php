<?php

namespace App\Repositories;

use App\Mail\NewsletterSubscribedMail;
use App\Models\CustomerReview;
use App\Models\Media;
use App\Models\NewsletterSubscriber;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class FrontendRepository
{
    
    public function getHomeMedia()
    {
        return $this->getMediaByModuleSection('Home');
    }

    public function getMediaByModuleSection(string $module, string $section = 'Banner'): ?Media
    {
        return Media::with([
            'images' => function ($query) {
                $query->where('is_active', 1)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('id', 'asc');
            },
        ])
            ->where('module', $module)
            ->where('section', $section)
            ->where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->latest('id')
            ->first();
    }

    public function getCustomerReviews()
    {
        $query = CustomerReview::query()
            ->active()
            ->orderBy('sort_order')
            ->latest('id');

        if (Schema::hasColumn('customer_reviews', 'package_id')) {
            $reviews = (clone $query)
                ->whereNull('package_id')
                ->limit(5)
                ->get();

            if ($reviews->isNotEmpty()) {
                return $reviews;
            }
        }

        return $query
            ->limit(5)
            ->get();
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
        $media = $this->getMediaByModuleSection('Newsletter Subscribe');
        $bannerFilePath = $media?->images?->first()?->file_path;
        $bannerImage = backend_storage_url(
            $bannerFilePath,
            config('constants.email_media_url')
        );
        $bannerImagePath = backend_storage_path($bannerFilePath);

        Mail::to($email)->queue(
            new NewsletterSubscribedMail($email, $bannerImage, $bannerImagePath)
        );
        return $subscriber;
    }
}
