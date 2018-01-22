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
    }

    /**
     * A test with portfolio entries.
     *
     * @return void
     */
    public function testHomepageWithPortfolioEntries()
    {
        \App\PortfolioEntry::create([
            'title' => "A test site",
            'url' => 'http://localhost:8000',
            'details' => 'Details about this site.',
        ]);

        $response = $this->get('/');

        $response->assertSee('Portfolio');
        $response->assertStatus(200);
    }
}
