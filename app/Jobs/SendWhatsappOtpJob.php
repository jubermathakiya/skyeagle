<?php

namespace App\Jobs;

use App\Services\WhatsAppService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendWhatsappOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;
    protected $otp;

    public function __construct($phone, $otp)
    {
        $this->phone = $phone;
        $this->otp = $otp;
    }

    public function handle(WhatsAppService $whatsAppService)
    {
        try {
            $whatsAppService->sendOtp($this->phone, $this->otp);
        } catch (\Exception $e) {
            Log::error('WhatsApp OTP failed', [
                'phone' => $this->phone,
                'error' => $e->getMessage()
            ]);
        }
    }
}