<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Food\{Order,Restaurant};
use Illuminate\Http\{RedirectResponse,Response,Request};

class FoodController extends Controller
{
    public function index(Request $request): RedirectResponse | Response
    {
        $list = collect([]);
        if(isset($request->q)) {
            $list = Restaurant::search($request->q ?? '')->get()->merge(Order::search($request->q ?? '')->get());
        }

        if($list->count() === 1) {
            $routeName = get_class($list[0]) === Restaurant::class ? 'web.food.restaurant' : 'web.food.order';
            return redirect(route($routeName, $list[0]->id));
        }

        return response()->view('food.search', compact('list'));
    }

    public function restaurant(Restaurant $restaurant): Response
    {
        return response()->view('food.restaurant', ['restaurant' => $restaurant]);
    }

    public function order(Order $order): Response
    {
        return response()->view('food.order', ['order' => $order]);
    }
}
