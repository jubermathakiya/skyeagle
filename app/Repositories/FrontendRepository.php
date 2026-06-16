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
