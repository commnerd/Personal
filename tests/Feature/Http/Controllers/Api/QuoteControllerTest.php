<?php

namespace Http\Controllers\Api;

use App\Models\Quote;
use Tests\Feature\TestCase;

class QuoteControllerTest extends TestCase
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
        $response = $this->get(route('api.quotes.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $quote = Quote::factory()->make();

        $response = $this->post(route('api.quotes.store'), $quote->toArray());

        $response->assertStatus(200);

        $response->assertJson($quote->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $quote = Quote::factory()->create();

        $response = $this->get(route('api.quotes.show', $quote));

        $response->assertStatus(200);

        $response->assertJson($quote->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $quote = Quote::factory()->create();
        $quoteUpdate = Quote::factory()->make();

        $response = $this->put(route('api.quotes.update', $quote), $quoteUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($quoteUpdate->toArray());
        $response->assertJson(['id' => $quote->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $quote = Quote::factory()->create();

        $response = $this->get(route('api.quotes.destroy', $quote));

        $response->assertStatus(200);
    }
}
