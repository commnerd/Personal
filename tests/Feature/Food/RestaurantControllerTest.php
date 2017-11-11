<?php

namespace Tests\Feature\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Food\Restaurant;
use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test restaurant index page
     *
     * @return void
     */
     public function testGetRestaurantIndexPage()
     {
         Restaurant::create(['name' => 'McDonalds']);

         $response = $this->get('/food/restaurants');

         $response->assertStatus(200);

         $response->assertSee('Restaurant List');

         $response->assertSee('McDonalds');
     }

     /**
      * Test restaurant create page
      *
      * @return void
      */
     public function testGetRestaurantCreationPage()
     {
         $response = $this->get('/food/restaurants/create');

         $response->assertStatus(200);

         $response->assertSee('Create Restaurant');
     }

     /**
      * Test restaurant Store Call
      *
      * @return void
      */
     public function testPostRestaurantCreation()
     {
         /*
         $restaurant = new Restaurant();

         $restaurant->fill(['name' => 'McDonalds']);

         $response = $this->post('/food/restaurants');

         $response->assertStatus(200);

         $this->assertEqual(1, Restaurants::count());
         */
     }
}
