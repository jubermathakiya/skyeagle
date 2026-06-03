<?php

namespace App\Repositories;

use App\Models\Media;
use App\Models\NewsletterSubscriber;

class FrontendRepository
{
    
    public function getHomeMedia()
    {
        return Media::with('images')
        ->where('module', 'Home')
        ->where('is_active', 1)
        ->first();
    }

    public function alreadySubscribed(string $email): bool
    {
        return NewsletterSubscriber::query()
            ->where('email', $email)
            ->exists();
    }

    public function subscribeNewsletter(string $email): NewsletterSubscriber
    {
        return NewsletterSubscriber::create([
            'email' => $email,
        ]);
    }
}