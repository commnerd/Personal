<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Auth;

class MainPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup for admin page
     */
    public function setUp()
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * Basic unauthorized page load test.
     *
     * @return void
     */
    public function testUnauthorizedAccess()
    {
        Auth::logout();

        $response = $this->get(route('admin'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Basic page load test
     */
    public function testAuthorizedAccess()
    {
        $response = $this->get(route('admin'));

        $response->assertSuccessful();
    }
}
