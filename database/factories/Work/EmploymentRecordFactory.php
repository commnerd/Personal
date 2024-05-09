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
            'bullets' => fake()->text(),
            'location' => fake()->text(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
        ];
    }
}
