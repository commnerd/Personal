<?php

namespace Database\Factories\Food;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => \App\Models\Food\Restaurant::inRandomOrder()->first()->id,
            'label' => fake()->name(),
            'notes' => fake()->text(),
        ];
    }
}
