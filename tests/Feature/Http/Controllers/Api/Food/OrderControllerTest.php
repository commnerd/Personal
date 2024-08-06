<?php

namespace Tests\Feature\Http\Controllers\Api\Food;

use App\Models\Food\{Order, Restaurant};
use Tests\Feature\TestCase;

class OrderControllerTest extends TestCase
{
    private $parentRestaurant;


    public function setUp(): void
    {
        parent::setUp();
        $this->login();
        $this->parentRestaurant = Restaurant::factory()->create();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.food.orders.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $order = Order::factory()->make(['restaurant_id' => $this->parentRestaurant->id]);

        $response = $this->post(route('api.food.orders.store', $this->parentRestaurant), $order->toArray());

        $response->assertStatus(200);

        $response->assertJson($order->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $order = Order::factory()->create(['restaurant_id' => $this->parentRestaurant->id]);

        $response = $this->get(route('api.food.orders.show', $order));

        $response->assertStatus(200);

        $response->assertJson($order->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $order = Order::factory()->create(['restaurant_id' => $this->parentRestaurant->id]);
        $order_update = Order::factory()->make();

        $response = $this->put(route('api.food.orders.update', $order), $order_update->toArray());

        $response->assertStatus(200);
        $response->assertJson($order_update->toArray());
        $response->assertJson(['id' => $order->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $order = Order::factory()->create(['restaurant_id' => $this->parentRestaurant->id]);

        $response = $this->delete(route('api.food.orders.destroy', $order));

        $response->assertStatus(200);
    }
}
