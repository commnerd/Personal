<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;

abstract class FoodController extends Controller
{
    const PAGINATION_RECORD_COUNT = 20;
}
