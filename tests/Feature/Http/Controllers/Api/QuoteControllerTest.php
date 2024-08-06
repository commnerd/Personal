<?php

namespace Tests\Feature\Http\Controllers\Api;

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
     * Test that there is only a single active quote after creating a quote with an active status
     */
    public function test_active_store(): void
    {
        $firstQuote = Quote::factory()->create([
            'active' => true,
        ]);
        $secondQuote = Quote::factory()->make();

        $secondQuote->active = true;
        $response = $this->post(route('api.quotes.store'), $secondQuote->toArray());

        $response->assertStatus(200);

        $this->assertEquals(Quote::findOrFail($firstQuote->id)->active, false);
        $this->assertEquals(Quote::orderBy('id', 'desc')->firstOrFail()->active, true);
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
     * Test that there is only a single active quote after updating the active status of a quote
     */
    public function test_active_update(): void
    {
        $firstQuote = Quote::factory()->create([
            'active' => true,
        ]);
        $secondQuote = Quote::factory()->create();

        $secondQuote->active = true;
        $response = $this->put(route('api.quotes.update', $secondQuote), $secondQuote->toArray());

        $response->assertStatus(200);

        $this->assertEquals(Quote::findOrFail($firstQuote->id)->active, false);
        $this->assertEquals(Quote::findOrFail($secondQuote->id)->active, true);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $quote = Quote::factory()->create();

        $response = $this->delete(route('api.quotes.destroy', $quote));

        $response->assertStatus(200);
    }
}
