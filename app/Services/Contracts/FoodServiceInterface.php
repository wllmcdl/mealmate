<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface FoodServiceInterface
{
    public function getAllFood(): Collection;

    public function getFoodByName(string $foodName): Collection;
}
