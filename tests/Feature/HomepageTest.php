<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertSee('Family');
        $response->assertStatus(200);
    }
}
