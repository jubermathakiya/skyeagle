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
            $user = $this->profileRepository->updateProfile(
                $request->user(),
                $request->validated(),
                $request->file('profile_image'),
                $request->boolean('remove_profile_image')
            );

            $addr = $user->userAddress;

            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully.',
                'data' => [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'name' => $user->name,
                    'address_line1' => $addr?->address_line1,
                    'postal_code' => $addr?->postal_code,
                    'country_id' => $addr?->country_id,
                    'state_id' => $addr?->state_id,
                    'city_id' => $addr?->city_id,
                    'country' => $addr?->country?->display_name,
                    'state' => $addr?->state?->display_name,
                    'city' => $addr?->city?->display_name,
                    'profile_photo_url' => $user->profile_photo_url,
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
