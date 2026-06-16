<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscribedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public string $email;
    public ?string $bannerImage;
    public ?string $bannerImagePath;
    /**
     * Create a new message instance.
     */
    public function __construct(string $email, ?string $bannerImage = null, ?string $bannerImagePath = null)
    {
        $this->email = $email;
        $this->bannerImage = $bannerImage;
        $this->bannerImagePath = $bannerImagePath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Sky Eagle Trip Newsletter',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter.subscribed',
            with: [
                'email' => $this->email,
                'bannerImage' => $this->bannerImage,
                'bannerImagePath' => $this->bannerImagePath,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
