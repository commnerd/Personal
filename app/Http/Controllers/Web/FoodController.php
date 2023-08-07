<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Response,Request};


class FoodController extends Controller
{
    public function index(): Response
    {
        return response()->view('food');
    }
}
