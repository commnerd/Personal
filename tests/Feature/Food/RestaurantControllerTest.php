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

         $response->assertSee('<a class="glyphicon glyphicon-plus" href="http://localhost/food/restaurants/create"></a>');

         $response->assertSee('<a class="glyphicon glyphicon-edit" href="http://localhost/food/restaurants/1/edit"></a>');

         $response->assertSee('<a href="http://localhost/food/restaurants/1">McDonalds</a>');
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

         $response->assertSee('<input type="text" name="name"');

         $response->assertSee('<input class="btn btn-default" type="submit" />');
     }

     /**
      * Test Restaurant Store Call
      *
      * @return void
      */
     public function testPostRestaurantCreation()
     {
         $restaurant = new Restaurant(['name' => 'McDonalds']);

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

     /**
      * Test get restaurant update page
      *
      * @return void
      */
     public function testGetRestaurantEditPage()
     {
         Restaurant::create(['name' => 'McDonalds']);

         $response = $this->get('/food/restaurants/1/edit');

         $response->assertSuccessful();

         $response->assertSee('Edit McDonalds');

         $response->assertSee('<input type="text" name="name"');

         $response->assertSee('<input class="btn btn-default" type="submit" />');
     }

     /**
      * Test updating a Restaurant
      *
      * @return void
      */
     public function testPutRestaurantUpdate()
     {
         Restaurant::create(['name' => 'McDonalds']);

         $response = $this->put('/food/restaurants/1', ['name' => 'Taco Bell']);

         $this->assertEquals('Taco Bell', Restaurant::findOrFail(1)->name);
     }

     public function testDeleteRestaurant()
     {
         Restaurant::create(['name' => 'McDonalds']);

         $response = $this->delete('/food/restaurants/1');

         $response->assertStatus(302);

         $this->assertEquals(0, Restaurant::count());
     }

     /**
      * Ensure styles and scripts are included
      *
      * @return null
      */
     public function testStyleAndScriptPresence()
     {
         $response = $this->get('/food/restaurants');

         $response->assertSee('<link rel="stylesheet" href="'.elixir('/food/css/app.css').'">');

         $response->assertSee('<script src="'.elixir('/food/js/app.js').'"></script>');

         $response = $this->get('/food/restaurants/create');

         $response->assertSee('<link rel="stylesheet" href="'.elixir('/food/css/app.css').'">');

         $response->assertSee('<script src="'.elixir('/food/js/app.js').'"></script>');

         Restaurant::create(['name' => 'Test Restaurant']);

         $response = $this->get('/food/restaurants/1/edit');

         $response->assertSee('<link rel="stylesheet" href="'.elixir('/food/css/app.css').'">');

         $response->assertSee('<script src="'.elixir('/food/js/app.js').'"></script>');
     }
}
