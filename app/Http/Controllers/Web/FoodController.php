<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Food\{Order,Restaurant};
use Illuminate\Http\{RedirectResponse,Response,Request};

class FoodController extends Controller
{
    public function index(Request $request): RedirectResponse | Response
    {
        $list = Restaurant::search($request->q ?? '')->get()->merge(Order::search($request->q ?? '')->get());

        if($list->count() === 1) {
            return redirect(route('web.food.order', $list[0]->id));
        }

        return response()->view('food.search', compact('list'));
    }

    public function order(Order $order) {
        return response()->view('food.order', ['order' => $order]);
    }
}
