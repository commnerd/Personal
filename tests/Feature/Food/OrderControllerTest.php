<?php

namespace Tests\Feature\Food;

use App\Models\Food\Restaurant;
use App\Models\Food\Order;
use Tests\TestCase;
use Auth;

class OrderControllerTest extends TestCase
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
     * Test order index page
     *
     * @return void
     */
     public function testGetRestaurantOrdersPage()
     {
         $restaurant = Restaurant::create(['name' => 'McDonalds']);
         $order = Order::create([
             'restaurant_id' => 1,
             'active' => 0,
             'label' => '#1',
             'notes' => 'Test notes',
         ]);

         $response = $this->get(route('orders.index', [$restaurant]));

         $response->assertSuccessful();

         $response->assertSee("McDonalds Orders List");

         $response->assertSee('<a class="glyphicon glyphicon-plus" href="'.route('orders.create', [$restaurant]).'"></a>', false);

         $response->assertSee('<a class="glyphicon glyphicon-edit" href="'.route('orders.edit', [$restaurant, $order]).'"></a>', false);

         $response->assertSee('#1');
     }

     /**
      * Test order creation page
      *
      * @return void
      */
      public function testCreateOrderPage()
      {
          Restaurant::create(['name' => 'McDonalds']);

          $response = $this->get('/food/restaurants/1/orders/create');

          $response->assertSuccessful();

          $response->assertSee("Create Order for McDonalds");

          $response->assertSee('<input type="hidden" name="restaurant_id" value="1" />', false);

          $response->assertSee('<label for="label" class="control-label col-lg-12">Label</label>', false);

          $response->assertSee('<label for="notes" class="control-label col-lg-12">Notes</label>', false);

          $response->assertSee(view('shared.form.submit'));
      }

      /**
       * Test Order Store Call
       *
       * @return void
       */
      public function testPostOrderCreation()
      {
          Restaurant::create([
              'name' => 'McDonalds',
          ]);

          $order = new Order([
              'restaurant_id' => 1,
              'label' => '#1',
              'notes' => 'Test notes',
          ]);

          $response = $this->post('/food/restaurants/1/orders', $order->toArray());

          $response->assertStatus(302);

          $this->assertEquals(1, Order::count());
      }

      /**
       * Test order edit page
       *
       * @return void
       */
       public function testEditOrderPage()
       {
           Restaurant::create(['name' => 'McDonalds']);

           Order::create([
               'restaurant_id' => 1,
               'label' => '#1',
               'notes' => 'Test notes',
           ]);

           $response = $this->get('/food/restaurants/1/orders/1/edit');

           $response->assertSuccessful();

           $response->assertSee('Edit order "#1" for McDonalds');

           $response->assertSee('<input type="hidden" name="restaurant_id" value="1" />', false);

           $response->assertSee('<label for="label" class="control-label col-lg-12">Label</label>', false);

           $response->assertSee('<label for="notes" class="control-label col-lg-12">Notes</label>', false);

           $response->assertSee(view('shared.form.submit'));
       }

       public function testDeleteOrder()
       {
           Restaurant::create(['name' => 'McDonalds']);

           Order::create([
               'restaurant_id' => 1,
               'label' => '#1',
               'notes' => 'Test notes',
           ]);

           $response = $this->delete('/food/restaurants/1/orders/1');

           $this->assertEquals(0, Order::count());
       }

       /**
        * Ensure styles and scripts are included
        *
        * @return null
        */
       public function testStyleAndScriptPresence()
       {
           Restaurant::create(['name' => 'Test Restaurant']);

           $response = $this->get('/food/restaurants/1/orders');

           $response->assertSee('<link rel="stylesheet" href="'.elixir('/css/food/app.css').'">', false);

           $response->assertSee('<script async src="'.elixir('/js/food/app.js').'"></script>', false);

           $response = $this->get('/food/restaurants/1/orders/create');

           $response->assertSee('<link rel="stylesheet" href="'.elixir('/css/food/app.css').'">', false);

           $response->assertSee('<script async src="'.elixir('/js/food/app.js').'"></script>', false);

           Order::create([
               'restaurant_id' => 1,
               'active' => 0,
               'label' => '#1',
               'notes' => 'Test notes',
           ]);

           $response = $this->get('/food/restaurants/1/orders/1/edit');

           $response->assertSee('<link rel="stylesheet" href="'.elixir('/css/food/app.css').'">', false);

           $response->assertSee('<script async src="'.elixir('/js/food/app.js').'"></script>', false);
       }

}
