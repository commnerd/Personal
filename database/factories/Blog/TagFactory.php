<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $label = join(' ', $this->faker->unique()->words(rand(1, 3)));
        return [
            'label' => $label,
            'slug' => Str::slug($label),
        ];
    }
}
