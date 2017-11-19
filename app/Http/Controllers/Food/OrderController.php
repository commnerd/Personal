<?php

namespace App\Http\Controllers\Food;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Food\Restaurant;
use App\Food\Order;

class OrderController extends FoodController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(int $restaurantId): Response
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        return response()->view('food.orders.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        return response()->view('food.orders.form', [
            'restaurant' => $restaurant,
            'action' => route('restaurants.store'),
            'method' => 'POST',
            'title' => 'Create Order for '.$restaurant->name,
            'order' => new Order(),
        ]);

        return response()->view('food.orders.form', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
