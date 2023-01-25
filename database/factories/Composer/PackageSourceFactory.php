<?php

namespace Database\Factories\Composer;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Composer\Package;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Composer\PackageSource>
 */
class PackageSourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'composer_package_id' => Package::factory()->create()->getKey(),
            'reference' => '<some hash>',
            'type' => 'git',
            'url' => fake()->url(),
        ];
    }
}
