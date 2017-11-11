<?php

namespace Tests\Feature\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{

    /**
     * Test restaurant index page
     *
     * @return void
     */
     public function testGetRestaurantList()
     {
         $response = $this->get('/food/restaurants');

         $response->assertStatus(200);
     }
}
