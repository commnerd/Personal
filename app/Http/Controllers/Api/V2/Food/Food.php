<?php

namespace App\Http\Controllers\Api\V2\Food;

use App\Services\Food\Search as SearchService;
use App\Http\Controllers\Api\V2\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Food\Restaurant;
use App\Models\Food\Order;

class Food extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $results = new Collection();

        if(!empty($request->q)) {
            $results = SearchService::find($request->q);
        }

        return response()->json($results->map(function($item) { return $item['label']; }));
    }
}
