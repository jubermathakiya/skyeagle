<?php

namespace App\Repositories;

use App\Models\Wishlist;


class WishlistRepository extends BaseRepository
{
    public function __construct(Wishlist $model)
    {
        parent::__construct($model);
    }

    public function countForUser(int $userId)
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->count();
    }

    public function getPackageIdsForUser(int $userId)
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->pluck('package_id');
    }

    public function getPackagesForUser(int $userId)
    {
        return $this->model->newQuery()
            ->with([
                'package.images' => function ($query) {
                    $query->limit(4);
                },
                'package.category',
            ])
            ->where('user_id', $userId)
            ->latest()
            ->get()
            ->pluck('package')
            ->filter();
    }

    public function toggle(int $userId, int $packageId)
    {
        $wishlist = $this->model->newQuery()
            ->where('user_id', $userId)
            ->where('package_id', $packageId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();

            return [
                'wishlisted' => false,
                'count' => $this->countForUser($userId),
            ];
        }

        $this->model->newQuery()->create([
            'user_id' => $userId,
            'package_id' => $packageId,
        ]);

        return [
            'wishlisted' => true,
            'count' => $this->countForUser($userId),
        ];
    }
}
