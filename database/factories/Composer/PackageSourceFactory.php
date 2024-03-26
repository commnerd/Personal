<?php

namespace Database\Factories\Composer;

use App\Models\Composer\{Package,PackageSource};
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
            'composer_package_id' => Package::inRandomOrder()->first(),
            'reference' => fake()->name(),
            'type' => rand(0, 1) ? PackageSource::TYPE_GIT : PackageSource::TYPE_SVN,
            'url' => fake()->url(),
        ];
    }
}
