<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProfileRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getProfileForUser(int $userId)
    {
        return $this->model->newQuery()
            ->select(['id', 'first_name', 'last_name', 'email', 'phone', 'profile_image', 'avatar', 'created_at'])
            ->with([
                'userAddress.country',
                'userAddress.state',
                'userAddress.city',
            ])
            ->findOrFail($userId);
    }

    public function updateProfile(
        User $user,
        array $data,
        ?UploadedFile $profileImage = null,
        bool $removeProfileImage = false
    ): User {
        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        if ($removeProfileImage) {
            $this->deleteStoredProfileImage($user);
            $user->update(['profile_image' => null]);
        } elseif ($profileImage) {
            $this->deleteStoredProfileImage($user);
            $path = $profileImage->store('profiles', 'public');
            $user->update(['profile_image' => $path]);
        }

        $address = Arr::only($data, [
            'address_line1',
            'address_line2',
            'postal_code',
            'country_id',
            'state_id',
            'city_id',
        ]);

        $user->userAddress()->updateOrCreate(
            ['user_id' => $user->id],
            $address
        );

        return $user->fresh([
            'userAddress.country',
            'userAddress.state',
            'userAddress.city',
        ]);
    }

    protected function deleteStoredProfileImage(User $user): void
    {
        if (empty($user->profile_image)) {
            return;
        }

        Storage::disk('public')->delete($user->profile_image);
    }
}
