<?php

namespace Database\Factories\Work;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmploymentRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer' => fake()->name(),
            'position' => fake()->name(),
            'location' => fake()->name(),
            'start_date' => fake()->name(),
            'end_date' => fake()->date(),
            'bullets' => fake()->text(),
        ];
    }
}
