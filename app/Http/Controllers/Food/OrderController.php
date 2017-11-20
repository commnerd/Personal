<?php

namespace App\Http\Controllers\Food;

use Illuminate\Http\RedirectResponse;
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
    public function create(int $restaurantId): Response
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(int $restaurantId, Request $request): RedirectResponse
    {
        $request->validate(Order::getValidationRules());

        Order::create($request->all());

        return redirect('food.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $restaurantId
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function show(int $restaurantId, int $orderId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        $order = Order::findOrFail($orderId);

        return view('food.orders.show', compact('restaurant', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(int $restaurantId, int $orderId): Response
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        $order = Order::findOrFail($orderId);

        return response()->view('food.orders.form', [
            'restaurant' => $restaurant,
            'action' => route('orders.update', $restaurant, $order),
            'method' => 'PUT',
            'title' => 'Edit order "'.$order->label.'" for '.$restaurant->name,
            'order' => $order,
        ]);

        return response()->view('food.orders.form', compact('restaurant', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $restaurantId, int $orderId): RedirectResponse
    {
        return redirect('food.orders.index', $restaurantId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $restaurantId, int $orderId): RedirectResponse
    {
        Order::destroy($orderId);

        return redirect('food.orders.index');
    }
}
