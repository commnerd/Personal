<?php

namespace Tests\Feature\Http\Controllers\Api\Work;

use App\Models\Work\PortfolioEntry;
use Tests\Feature\TestCase;

class PortfolioEntryControllerTest extends TestCase
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
        $response = $this->get(route('api.work.portfolio-entries.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $portfolioEntry = PortfolioEntry::factory()->make();

        $response = $this->post(route('api.work.portfolio-entries.store'), $portfolioEntry->toArray());

        $response->assertStatus(200);

        $response->assertJson($portfolioEntry->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $portfolioEntry = PortfolioEntry::factory()->create();

        $response = $this->get(route('api.work.portfolio-entries.show', $portfolioEntry));

        $response->assertStatus(200);

        $response->assertJson($portfolioEntry->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $portfolioEntry = PortfolioEntry::factory()->create();
        $portfolioEntryUpdate = PortfolioEntry::factory()->make();

        $response = $this->put(route('api.work.portfolio-entries.update', $portfolioEntry), $portfolioEntryUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($portfolioEntryUpdate->toArray());
        $response->assertJson(['id' => $portfolioEntry->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $portfolioEntry = PortfolioEntry::factory()->create();

        $response = $this->delete(route('api.work.portfolio-entries.destroy', $portfolioEntry));

        $response->assertStatus(200);
    }
}
