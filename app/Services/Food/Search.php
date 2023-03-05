<?php

namespace App\Services\Food;

use Illuminate\Support\Collection;
use App\Models\Food\Restaurant;
use App\Models\Food\Order;

class Search
{
    public static function collect(): Collection
    {
        $collection = new Collection();

        $restaurants = Restaurant::all();
        foreach($restaurants as $restaurant) {
            if(!$collection->contains($restaurant->name)) {
                $collection = $collection->push([
                    'route' => route('restaurants.show', $restaurant->id),
                    'label' => $restaurant->name,
                ]);
            }
        }

        $orders = Order::all();
        foreach($orders as $order) {
            if(!$collection->contains($order->label)) {
                $collection = $collection->push([
                    'route' => route('restaurants.show', $order->restaurant->id),
                    'label' => $order->label,
                ]);
            }
        }

        return $collection->sortBy('label');
    }
}
