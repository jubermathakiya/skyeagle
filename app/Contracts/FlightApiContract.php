<?php

namespace App\Contracts;

interface FlightApiContract
{
    public function search(array $criteria): array;
}
