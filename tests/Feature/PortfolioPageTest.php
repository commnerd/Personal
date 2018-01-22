<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfolioPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test without portfolio entries.
     *
     * @return void
     */
    public function testHomepageWithoutPortfolioEntries()
    {
        $response = $this->get('/');

        $response->assertDontSee('Portfolio');
        $response->assertStatus(200);
        $this->assertTrue(true);
    }

    /**
     * A test with portfolio entries.
     *
     * @return void
     */
    public function testHomepageWithPortfolioEntries()
    {
        $response = $this->get('/');

        $response->assertSee('Portfolio');
        $response->assertStatus(200);
        $this->assertTrue(true);
    }
}
