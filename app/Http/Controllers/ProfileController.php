<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function __construct(
        protected ProfileRepository $profileRepository
    ) {
    }

    public function show()
    {
        $user = $this->profileRepository->getProfileForUser(Auth::id());

        return view('pages.profile.show', [
            'user' => $user,
        ]);
    }

    public function settings()
    {
        $user = $this->profileRepository->getProfileForUser(Auth::id());

        return view('pages.profile.settings', [
            'user' => $user,
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            $user = $this->profileRepository->updateBasicInformation(
                $request->user(),
                $request->validated()
            );

            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully.',
                'data' => [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'name' => $user->name,
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Profile Update Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again!',
            ], 500);
        }
    }
}
