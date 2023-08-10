<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Food\{Order,Restaurant};
use Illuminate\Http\{Response,Request};

class FoodController extends Controller
{
    public function index(Request $request): Response
    {
        $orderList = Order::search($request->q ?? '')->get();
        $list = $orderList;
        return response()->view('food', ['list' => $list]);
    }
}
