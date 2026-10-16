<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        $title = join(' ', $this->faker->unique()->words(rand(1, 3)));
        $published = (bool)rand(0, 2) ? $this->faker->dateTimeBetween('-10 years', '+ 10 years') : null;
        return [
            'user_id' => User::inRandomOrder()->first(),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => join("\n<br />\n<br />\n", $this->faker->paragraphs(rand(5, 30))),
            'published_at' => $published,
        ];
    }
}
