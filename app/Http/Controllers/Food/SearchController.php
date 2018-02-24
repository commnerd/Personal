<?php

namespace App\Http\Controllers\Food;

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
        public function index(): Response
        {
            return response()->view('food.search');
        }
}
