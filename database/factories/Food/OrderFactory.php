<?php

namespace Database\Factories\Food;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Food\Restaurant;
use App\Models\Food\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food\OrderSource>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::factory()->create()->getKey(),
            'label' => fake()->name(),
            'notes' => fake()->text(),
        ];
    }
}
