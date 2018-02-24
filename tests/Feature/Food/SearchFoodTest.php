<?php

namespace Tests\Feature\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Auth;

class SearchFoodTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup tests
     */
    public function setUp() {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * Search page test
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/food');

        $response->assertSuccessful();
    }
}
