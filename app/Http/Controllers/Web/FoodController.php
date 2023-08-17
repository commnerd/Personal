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

        if($list->count() === 1) {
            return response->redirect();
        }

        return response()->view('food.search', ['list' => $list]);
    }

    public function order(Order $order) {
        return response()->view('food.order', ['order' => $order]);
    }
}
