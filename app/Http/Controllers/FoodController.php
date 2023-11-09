<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Services\Contracts\FoodServiceInterface;

class FoodController extends Controller
{
    public function __construct(protected readonly FoodServiceInterface $service)
    {
    }

    public function getAllFood()
    {
        return $this->service->getAllFood();
    }

    public function getFoodByName(FoodRequest $request)
    {
        return $this->service->getFoodByName($request->name);
    }
}
