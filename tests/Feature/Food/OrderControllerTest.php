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

         $response->assertSee('#1');
     }

     /**
      * Test order index page
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
      }
}
