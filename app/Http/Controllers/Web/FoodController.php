<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Food\{Order,Restaurant};
use Illuminate\Http\{Response,Request};

class FoodController extends Controller
{
    public function index(Request $request): Response
    {
        $list = Restaurant::search($request->q ?? '')->get()->merge(Order::search($request->q ?? '')->get());

        return response()->view('food', ['list' => $list]);
    }
}
