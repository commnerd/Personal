<?php

namespace App\Http\Controllers\Api\V1\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Food\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Order::paginate(self::PAGE_COUNT));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $order = Order::create($request->all());

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int                   $restaurantId
     * @param  \App\Models\Food\Order       $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $restaurantId, Order $order): JsonResponse
    {
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $restaurantId
     * @param  \App\Models\Food\Order           $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $restaurantId, Order $order): JsonResponse
    {
        $order->fill($request->all());

        $order->save();

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                   $restaurantId
     * @param  \App\Models\Food\Order  $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $restaurantId, Order $order): JsonResponse
    {
        $order->delete();

        return response()->json();
    }
}
