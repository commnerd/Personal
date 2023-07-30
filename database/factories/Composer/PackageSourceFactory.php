<?php

namespace Database\Factories\Composer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageSourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'composer_package_id' => \App\Models\Composer\Package::inRandomOrder()->first(),
            'reference' => fake()->name(),
            'type' => fake()->name(),
            'url' => fake()->url(),
        ];
    }
}
