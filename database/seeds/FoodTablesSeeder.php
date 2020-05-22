<?php

use Illuminate\Database\Seeder;
use App\Models\Food\Restaurant;
use App\Models\Food\Order;

class FoodTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurant::class, 20)->create()->each(function(Restaurant $restaurant) {
            factory(Order::class, rand(1, 5))->create([
                "restaurant_id" => $restaurant->id,
            ]);
        });
    }
}
