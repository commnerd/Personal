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

         $response->assertSuccessful();

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

         $response->assertSuccessful();

         $response->assertSee('Create Restaurant');

         $response->assertSee('<input name="name"');
     }

     /**
      * Test Restaurant Store Call
      *
      * @return void
      */
     public function testPostRestaurantCreation()
     {
         $restaurant = new Restaurant();

         $restaurant->fill(['name' => 'McDonalds']);

         $response = $this->post('/food/restaurants', $restaurant->toArray());

         $response->assertStatus(302);

         $this->assertEquals(1, Restaurant::count());
     }

     /**
      * Test invalid restaurant store call
      *
      * @return void
      */
     public function testPostInvalidRestaurantCreation()
     {
         $restaurant = new Restaurant();

         $response = $this->post('/food/restaurants', $restaurant->toArray());

         $response->assertStatus(302);

         $this->assertEquals(0, Restaurant::count());
     }
}
