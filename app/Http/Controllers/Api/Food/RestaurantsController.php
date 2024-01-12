<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Api\Controller;
use App\Models\Food\Order;
use App\Models\Food\Restaurant;
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Support\Facades\DB;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Restaurant::with('orders')->paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Restaurant::getValidationRules());

        DB::beginTransaction();
        $restaurant = Restaurant::create($request->all());
        if(isset($request->orders)) {
            $restaurant->orders()->createMany($request->orders);
        }
        DB::commit();

        $restaurant->load('orders');

        return response()->json($restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant->load('orders');

        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate(Restaurant::getValidationRules());

        DB::beginTransaction();
        $restaurant->update($request->all());
        $keepers = collect($request->orders)->each(function($order) use ($restaurant) {
            if(isset($order['id'])) {
                Order::find($order['id'])->update($order);
            } else {
                $order['restaurant_id'] = $restaurant->id;
                Order::make($order)->save();
            }
        })->pluck('id');
        Order::whereNotIn('id', $keepers)->delete();
        DB::commit();

        $restaurant->load('orders');

        return response()->json($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
    }
}
