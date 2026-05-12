<?php

namespace App\Repositories;

use App\Models\User;

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
            ->findOrFail($userId);
    }

    public function updateBasicInformation(User $user, array $data)
    {
        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        return $user->fresh();
    }
}
