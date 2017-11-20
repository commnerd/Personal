<?php

namespace Tests\Feature\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Food\Restaurant;
use App\Food\Order;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test order index page
     *
     * @return void
     */
     public function testGetRestaurantOrdersPage()
     {
         Restaurant::create(['name' => 'McDonalds']);
         Order::create([
             'restaurant_id' => 1,
             'active' => 0,
             'label' => '#1',
             'notes' => 'Test notes',
         ]);

         $response = $this->get('/food/restaurants/1/orders');

         $response->assertSuccessful();

         $response->assertSee("McDonalds Orders List");

         $response->assertSee('<a class="glyphicon glyphicon-plus" href="http://localhost/food/restaurants/1/orders/create"></a>');

         $response->assertSee('<a class="glyphicon glyphicon-edit" href="http://localhost/food/restaurants/1/orders/1/edit"></a>');

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

          $response->assertSee('<input type="hidden" name="restaurant_id" value="1" />');

          $response->assertSee('<label for="label" class="control-label col-md-2">Label</label>');

          $response->assertSee('<label for="notes" class="control-label col-md-2">Notes</label>');

          $response->assertSee('<input class="btn btn-default" type="submit" />');
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

           $response->assertSee('Edit order &quot;#1&quot; for McDonalds');

           $response->assertSee('<input type="hidden" name="restaurant_id" value="1" />');

           $response->assertSee('<label for="label" class="control-label col-md-2">Label</label>');

           $response->assertSee('<label for="notes" class="control-label col-md-2">Notes</label>');

           $response->assertSee('<input class="btn btn-default" type="submit" />');
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

           $response->assertSee('<link rel="stylesheet" href="'.elixir('/food/css/app.css').'">');

           $response->assertSee('<script src="'.elixir('/food/js/app.js').'"></script>');

           $response = $this->get('/food/restaurants/1/orders/create');

           $response->assertSee('<link rel="stylesheet" href="'.elixir('/food/css/app.css').'">');

           $response->assertSee('<script src="'.elixir('/food/js/app.js').'"></script>');

           Order::create([
               'restaurant_id' => 1,
               'active' => 0,
               'label' => '#1',
               'notes' => 'Test notes',
           ]);

           $response = $this->get('/food/restaurants/1/orders/1/edit');

           $response->assertSee('<link rel="stylesheet" href="'.elixir('/food/css/app.css').'">');

           $response->assertSee('<script src="'.elixir('/food/js/app.js').'"></script>');
       }

}
