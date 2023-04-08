<?php

namespace App\Http\Controllers\Api\V2\Food;

use App\Http\Controllers\Controller;
use App\Models\Food\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Orders extends Controller
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
        return response()->json(Order::factory()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food\Order  $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $order): JsonResponse
    {
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Order $order): JsonResponse
    {
        $order->update($request->toArray());
        return response()->json($order);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Composer\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Order $order): JsonResponse
    {
        $order->delete();
        return response()->json($order);
    }
}
