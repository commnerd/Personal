<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Home page tests
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertSee('Family');
        $response->assertStatus(200);

        $response->assertSee('<a class="navbar-brand" href="'.route('home').'"><img height="100%" alt="Michael J. Miller" src="/storage/michael-j-miller-logo.png"></a>');
    }
}
