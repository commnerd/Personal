<?php

namespace App\Http\Controllers\Api\V2\Food;

use App\Http\Controllers\Controller;
use App\Models\Food\Restaurant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Restaurants extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Restaurant::paginate(self::PAGE_COUNT));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(Restaurant::factory()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food\Restaurant  $restaurant
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Restaurant $restaurant): JsonResponse
    {
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food\Restaurant $restaurant
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Restaurant $restaurant): JsonResponse
    {
        $restaurant->update($request->toArray());
        return response()->json($restaurant);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Composer\Restaurant $restaurant
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Restaurant $restaurant): JsonResponse
    {
        $restaurant->delete();
        return response()->json($restaurant);
    }
}
