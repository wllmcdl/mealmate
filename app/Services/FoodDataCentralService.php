<?php

namespace App\Services;

use App\Services\Contracts\FoodServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class FoodDataCentralService implements FoodServiceInterface
{
    //    "foodSearchCriteria": {
    //        "dataType": [
    //            "Foundation",
    //            "SR Legacy"
    //        ],
    //        "query": "chicken breast fried",
    //        "generalSearchInput": "chicken breast fried",
    //        "foodCategory": "Poultry Products",
    //        "pageNumber": 1,
    //        "sortBy": "fdcId",
    //        "sortOrder": "desc",
    //        "numberOfResultsPerPage": 50,
    //        "pageSize": 50,
    //        "requireAllWords": true,
    //        "foodTypes": [
    //            "Foundation",
    //            "SR Legacy"
    //        ]
    //    }

    // "Branded": 21502,
    // "Survey (FNDDS)": 471,
    // "SR Legacy": 428,
    // "Foundation": 5

    private string $key;

    public function __construct()
    {
        $this->key = app()->fdcApiKey;
    }

    public function getAllFood(): Collection
    {
        $response = Http::post("https://api.nal.usda.gov/fdc/v1/foods/list?api_key=$this->key", [
            'dataType' => ['Foundation', 'SR Legacy'],
            'pageSize' => 50,
            'sortBy' => 'fdcId',
            'sortOrder' => 'asc',
            'pageNumber' => 1,
        ]);

        return $response->collect();
    }

    public function getFoodByName(string $foodName): Collection
    {
        $response = Http::post("https://api.nal.usda.gov/fdc/v1/foods/list?api_key=$this->key", [
            'query' => $foodName,
            'dataType' => ['Foundation', 'SR Legacy'],
            'pageSize' => 50,
            // "pageNumber" => 1,
            // 'sortBy' => 'fdcId',
            // "sortOrder" => "desc",
            // "brandOwner" => ""
            // "foodCategory" => "Poultry Products",
            // "numberOfResultsPerPage" => 50,
            'requireAllWords' => true,
        ]);

        return $response->collect();
    }
}
