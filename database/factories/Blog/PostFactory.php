<?php

namespace Database\Factories\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucwords(implode(' ', fake()->unique()->words()));
        $published = (bool)rand(0,1);

        return [
            'title' => $title,
            'slug' => Str::snake($title),
            'body' => fake()->text(),
            'published_by' => $published ? User::inRandomOrder()->first()->id : null,
            'published_at' => $published ? fake()->dateTimeAD() : null,
            'created_by' => User::inRandomOrder()->first()->id,
        ];
    }
}
