<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Repositories\FrontendRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    protected $frontendRepository;

    public function __construct(FrontendRepository $frontendRepository)
    {
        $this->frontendRepository = $frontendRepository;
    }
    
    public function subscribe(Request $request)
    {
        try {
            $validated = $request->validate([
                "email" => "required|email|max:255",
            ]);
            $email = strtolower(trim($validated["email"]));
            $alreadySubscribed = $this->frontendRepository->alreadySubscribed($email);
            if ($alreadySubscribed) {
                return response()->json([
                    "status" => true,
                    "message" => "You are already subscribed.",
                ]);
            }
            $this->frontendRepository->subscribeNewsletter($email);
            return response()->json([
                "status" => true,
                "message" => "Subscribed successfully.",
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error("Newsletter subscribe error: " . $e->getMessage(), [
                "error" => $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine(),
            ]);
            return response()->json([
                "status" => false,
                "message" => "Something went wrong. Please try again!",
            ], 500);
        }
             
    }
}

