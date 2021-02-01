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
        Restaurant::factory()->count(20)
            ->has(
                Order::factory()->count(rand(1, 5))
            )
            ->create();
    }
}
