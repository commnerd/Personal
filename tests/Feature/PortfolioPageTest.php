<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

        $response->assertStatus(200);
        $response->assertDontSee('Portfolio');
    }

    /**
     * A test with portfolio entries.
     *
     * @return void
     */
    public function testHomepageWithPortfolioEntries()
    {
        \App\Work\PortfolioEntry::create([
            'title' => "A test site",
            'url' => 'http://localhost:8000',
            'details' => 'Details about this site.',
        ]);

        $response = $this->get('/');

        $response->assertSee('Portfolio');
        $response->assertStatus(200);
    }
}
