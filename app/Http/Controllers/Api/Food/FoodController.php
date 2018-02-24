<?php

namespace App\Http\Controllers\Api\Food;

use App\Services\Food\Search as SearchService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Food\Restaurant;
use App\Food\Order;

class FoodController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $results = new Collection();

        if(!empty($request->term)) {
            $results = SearchService::find($request->term);
        }

        return response()->json($results->map(function($item) { return $item['label']; }));
    }
}
