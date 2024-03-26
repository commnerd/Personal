<?php

namespace Database\Factories\Composer;

use App\Models\Composer\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'version' => fake()->randomFloat(),
            'type' => rand(0, 1) ? Package::TYPE_LIBRARY : Package::TYPE_PROJECT,
        ];
    }
}
