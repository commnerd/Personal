<?php

namespace Tests\Feature\Controllers\Api\Blog;

use App\Models\Blog\Post;
use Tests\Feature\TestCase;

class PostControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.blog.posts.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $post = Post::factory()->make();

        $response = $this->post(route('api.blog.posts.store'), $post->toArray());

        $response->assertStatus(200);

        $response->assertJson(array_merge($post->toArray(), ['created_by' => 1]));
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $post = Post::factory()->create();

        $response = $this->get(route('api.blog.posts.show', $post));

        $response->assertStatus(200);

        $response->assertJson($post->toArray());
    }

    /**
     * A show test with PackageSources.
     */
    public function test_package_source_show(): void
    {
        $post = Post::factory()->create();

        $response = $this->get(route('api.blog.posts.show', $post));

        $response->assertStatus(200);

        $response->assertJson($post->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $post = Post::factory()->create();
        $postUpdate = Post::factory()->make();

        $response = $this->put(route('api.blog.posts.update', $post), $postUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($postUpdate->toArray());
        $response->assertJson(['id' => $post->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $post = Post::factory()->create();

        $response = $this->get(route('api.blog.posts.destroy', $post));

        $response->assertStatus(200);
    }
}
