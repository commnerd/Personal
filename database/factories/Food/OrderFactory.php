<?php

namespace Database\Factories\Food;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Food\Restaurant;
use App\Models\Food\Order;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'label' => $this->faker->name,
            'notes' => $this->faker->paragraph,
        ];
    }
}
