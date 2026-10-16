<?php

namespace Database\Seeders;

use App\Models\Blog\{Post, Tag, PostTag};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::chunk(50, function(Collection $posts) {
            foreach($posts as $post) {
                $iterations = rand(2, 5);
                for ($i = 0; $i < $iterations; $i++) {
                    $tagId = Tag::inRandomOrder()->first()->id;
                    while(PostTag::where('post_id', $post->id)->where('tag_id', $tagId)->count() > 0) {
                        $tagId = Tag::inRandomOrder()->first()->id;
                    }
                    PostTag::create([
                        'post_id' => $post->id,
                        'tag_id' => $tagId,
                    ]);
                }
            } 
        });
    }
}
