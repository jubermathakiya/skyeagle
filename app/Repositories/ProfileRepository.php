<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;

class ProfileRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getProfileForUser(int $userId)
    {
        return $this->model->newQuery()
            ->select(['id', 'first_name', 'last_name', 'email', 'phone', 'created_at'])
            ->with([
                'userAddress.country',
                'userAddress.state',
                'userAddress.city',
            ])
            ->findOrFail($userId);
    }

    public function updateProfile(User $user, array $data): User
    {
        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

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
}
