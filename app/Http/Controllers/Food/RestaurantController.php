<?php

namespace App\Http\Controllers\Food;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Food\Restaurant;
use App\Models\Food\Order;

class RestaurantController extends FoodController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $restaurants = Restaurant::paginate(self::PAGINATION_RECORD_COUNT);
        return response()->view('food.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('food.restaurants.form', [
            'action' => route('restaurants.store'),
            'method' => 'POST',
            'title' => 'Create Restaurant',
            'restaurant' => new Restaurant(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(Restaurant::getValidationRules());

        Restaurant::create($request->all());

        return redirect(route('restaurants.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant): Response
    {
        return response()->view('food.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant): Response
    {
        return response()->view('food.restaurants.form', [
            'action' => route('restaurants.update', $restaurant),
            'method' => 'PUT',
            'title' => "Edit $restaurant->name",
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant): RedirectResponse
    {
        $request->validate(Restaurant::getValidationRules());

        $restaurant->update($request->all());

        return redirect(route('restaurants.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant): RedirectResponse
    {
        $restaurant->delete();

        return redirect(route('restaurants.index'));
    }
}
