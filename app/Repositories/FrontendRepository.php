<?php

namespace App\Repositories;

use App\Mail\NewsletterSubscribedMail;
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
        Mail::to($email)->queue(
        new NewsletterSubscribedMail($email)
        );
        return $subscriber;
    }
}