<?php

namespace Database\Factories\Food;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Food\Restaurant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
