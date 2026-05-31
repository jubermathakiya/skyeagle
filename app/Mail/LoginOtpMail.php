<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginOtpMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $otp,
        public string $userName = 'User',
        public string $expiresIn = '5 minutes'
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Sky Eagle Trip login OTP',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.forgot-password-otp',
        );
    }
}
