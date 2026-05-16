<?php

namespace App\Repositories;

use App\Models\Airport;
use Illuminate\Support\Collection;

class AirportRepository extends BaseRepository
{
    public function __construct(Airport $model)
    {
        parent::__construct($model);
    }

    public function search(string $keyword, int $limit = 10): Collection
    {
        $keyword = trim($keyword);

        if ($keyword === '') {
            return Airport::query()
                ->where('is_active', true)
                ->orderBy('city')
                ->limit($limit)
                ->get();
        }

        return Airport::query()
            ->where('is_active', true)
            ->where(function ($query) use ($keyword) {
                $query->where('city', 'like', '%' . $keyword . '%')
                    ->orWhere('name', 'like', '%' . $keyword . '%')
                    ->orWhere('iata_code', 'like', '%' . strtoupper($keyword) . '%');
            })
            ->orderBy('city')
            ->limit($limit)
            ->get();
    }

    public function findByCode(string $code): ?Airport
    {
        return Airport::query()
            ->where('is_active', true)
            ->where('iata_code', strtoupper($code))
            ->first();
    }
}
