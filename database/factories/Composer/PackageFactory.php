<?php

namespace Database\Factories\Composer;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Composer\PackageSource;
use App\Models\Composer\Package;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Composer\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $packageTypes = array_keys(Package::TYPES);
        $sourceRules = PackageSource::getValidationRules();

        return [
            'name' => fake()->name(),
            'version' => fake()->semver(),
            'type' => $packageTypes[rand(0, sizeof($packageTypes) - 1)],
        ];
    }
}
