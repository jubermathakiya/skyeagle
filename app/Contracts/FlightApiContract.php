<?php

namespace App\Contracts;

interface FlightApiContract
{
    /**
     * @param  array<string, mixed>  $criteria
     * @return array{data: array<int, array<string, mixed>>, meta: array<string, mixed>}
     */
    public function search(array $criteria): array;
}
