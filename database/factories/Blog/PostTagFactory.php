<?php

namespace Database\Factories\Blog;

use App\Models\Blog\{Post, Tag, PostTag};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostTag>
 */
class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        [$postId, $tagId] = $this->postAndTag();
        while(PostTag::where('post_id', $postId)->where('tag_id', $tagId)->first()) {
            [$postId, $tagId] = $this->postAndTag();
        }
        return [
            'post_id' => $postId,
            'tag_id' => $tagId,
        ];
    }

    private function postAndTag(): array
    {
        $post = Post::inRandomOrder()->first();
        $tag = Tag::inRandomOrder()->first();
        return [$post->id, $tag->id];
    }
}
