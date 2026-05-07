<?php

namespace App\Services;

use Twilio\Rest\Client;

class WhatsAppService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $httpClient = new \Twilio\Http\CurlClient([
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);
        $this->client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token'),
            null,
            null,
            $httpClient
        );
        $this->from = config('services.twilio.whatsapp_from');
    }

    public function sendOtp($phone, $otp)
    {
        $message = "Welcome to SkyEagle 
        Your verification OTP is: {$otp}
        This OTP will expire in 5 minutes.
        - Team SkyEagle";

        return $this->client->messages->create(
            "whatsapp:+91{$phone}",
            [
                'from' => $this->from,
                'body' => $message,
            ]
        );
    }
}