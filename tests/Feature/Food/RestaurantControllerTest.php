<?php

namespace Tests\Feature\Food;

use App\Models\Food\Restaurant;
use App\Models\Food\Order;
use Tests\TestCase;
use Auth;

class RestaurantControllerTest extends TestCase
{
    /**
     * Setup tests
     */
    protected function setUp(): void
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * Test restaurant index page
     *
     * @return void
     */
     public function testGetRestaurantIndexPage()
     {
         $restaurant = Restaurant::create(['name' => 'McDonalds']);

         $response = $this->get(route('restaurants.index'));

         $response->assertSuccessful();

         $response->assertSee('Restaurant List');

         $response->assertSee('<a class="glyphicon glyphicon-plus" href="'.route('restaurants.create').'"></a>');

         $response->assertSee('<a class="glyphicon glyphicon-edit" href="'.route('restaurants.edit', [$restaurant]).'"></a>');

         $response->assertSee('<a href="'.route('restaurants.show', [$restaurant]).'">McDonalds</a>');
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

         $response->assertDontSee('<input type="radio" name="default_order"');

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
      * Test restaurant show page sans order
      *
      * @return void
      */
     public function testGetRestaurantShowPageSansOrder()
     {
         $restaurant = Restaurant::create(['name' => 'McDonalds']);

         $response = $this->get('/food/restaurants/'.$restaurant->id);

         $response->assertSuccessful();

         $response->assertSee('McDonalds');

         $response->assertDontSee('No active order');

         $response->assertSee('No Orders');
     }

     /**
      * Test restaurant show page with order
      *
      * @return void
      */
     public function testGetRestaurantShowPageWithOrder()
     {
         $restaurant = Restaurant::create(['name' => 'McDonalds']);

         $order = Order::create([
             'restaurant_id' => $restaurant->id,
             'label' => 'Default Order',
             'notes' => 'Lorum ipsum',
         ]);

         $response = $this->get('/food/restaurants/'.$restaurant->id);

         $response->assertSuccessful();

         $response->assertSee('McDonalds');

         $response->assertDontSee('No Active Order');

         $response->assertDontSee('No Orders');

         $response->assertSee($order->label);

         $response->assertSee($order->notes);

         $response->assertDontSee('<input class="btn btn-default" type="submit" />');
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
      * Test get restaurant update page sans order
      *
      * @return void
      */
     public function testGetRestaurantEditPageSansOrder()
     {
         Restaurant::create(['name' => 'McDonalds']);

         $response = $this->get('/food/restaurants/1/edit');

         $response->assertSuccessful();

         $response->assertSee('Edit McDonalds');

         $response->assertDontSee('<input type="radio" name="default_order"');

         $response->assertSee('<input type="text" name="name"');

         $response->assertSee('<input class="btn btn-default" type="submit" />');
     }

     /**
      * Test get restaurant update page with order
      *
      * @return void
      */
     public function testGetRestaurantEditPageWithOrder()
     {
         $restaurant = Restaurant::create(['name' => 'McDonalds']);

         $order = Order::create([
             'restaurant_id' => $restaurant->id,
             'label' => 'Default Order',
             'notes' => 'Lorum ipsum',
         ]);

         $response = $this->get('/food/restaurants/1/edit');

         $response->assertSuccessful();

         $response->assertSee('Edit McDonalds');

         $response->assertDontSee("Choose the active order for $restaurant->name:");

         $response->assertSee("Orders for $restaurant->name:");

         $response->assertDontSee('<input type="radio" name="default_order"');

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
         Restaurant::create(['name' => 'Taco Bell']);

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

         $response->assertSee('<link rel="stylesheet" href="'.elixir('/css/food/app.css').'">');

         $response->assertSee('<script src="'.elixir('/js/food/app.js').'"></script>');

         $response = $this->get('/food/restaurants/create');

         $response->assertSee('<link rel="stylesheet" href="'.elixir('/css/food/app.css').'">');

         $response->assertSee('<script src="'.elixir('/js/food/app.js').'"></script>');

         Restaurant::create(['name' => 'Test Restaurant']);

         $response = $this->get('/food/restaurants/1/edit');

         $response->assertSee('<link rel="stylesheet" href="'.elixir('/css/food/app.css').'">');

         $response->assertSee('<script src="'.elixir('/js/food/app.js').'"></script>');
     }

     /**
      * Test setting of default order
      *
      * @return null
      */
     public function testOrderSetting()
     {
         $restaurant = Restaurant::create(['name' => 'Test Restaurant']);

         Order::create([
             'restaurant_id' => $restaurant->id,
             'label' => 'Default Order',
             'notes' => 'Lorum ipsum',
         ]);

         $response = $this->put('/food/restaurants/1', [
             'name' => 'Taco Bell',
         ]);

         $response->assertRedirect(route('restaurants.index'));

         $this->assertEquals('Taco Bell', Restaurant::findOrFail(1)->name);
     }

     /**
      * Test redirect when logged out
      *
      * @return null
      */
     public function testRedirectWhenLoggedOut()
     {
         Auth::logout();

         $response = $this->get('/food/restaurants');

         $response->assertRedirect(route('login'));
     }
}
