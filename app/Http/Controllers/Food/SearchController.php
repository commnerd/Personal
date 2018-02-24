<?php

namespace App\Http\Controllers\Food;

use App\Services\Food\Search as SearchService;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class SearchController extends FoodController
{

        /**
         * Display a search page.
         *
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request): Response
        {
            $results = new Collection();

            if(!empty($request->term)) {
                $results = SearchService::find($request->term);
            }

            if($results->count() === 1) {
                $headers = [
                    'Location' => $results->pop()['route'],
                ];
                return response(null, 302)->withHeaders($headers);
            }

            return response()->view('food.search', [
                'results' => $results->map(function($item) { return $item['label']; }),
            ]);
        }
}
