<?php

namespace Http\Controllers\Api\Food;

use App\Models\Food\Order;
use App\Models\Food\Restaurant;
use Tests\Feature\TestCase;

class RestaurantControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.food.restaurants.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $restaurant = Restaurant::factory()->make();

        $response = $this->post(route('api.food.restaurants.store'), $restaurant->toArray());

        $response->assertStatus(200);

        $response->assertJson($restaurant->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('api.food.restaurants.show', $restaurant));

        $response->assertStatus(200);

        $response->assertJson($restaurant->toArray());
    }

    /**
     * A show test with orders.
     */
    public function test_order_show(): void
    {
        $restaurant = Restaurant::factory()->create();

        $orders = Order::factory(2)
            ->create(['restaurant_id' => $restaurant]);

        $response = $this->get(route('api.food.restaurants.show', $restaurant));

        $response->assertStatus(200);

        $response->assertJson($restaurant->toArray());

        $response->assertJsonCount(2, "orders");
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $restaurant = Restaurant::factory()->create();
        $restaurantUpdate = Restaurant::factory()->make();

        $response = $this->put(route('api.food.restaurants.update', $restaurant), $restaurantUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($restaurantUpdate->toArray());
        $response->assertJson(['id' => $restaurant->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->delete(route('api.food.restaurants.destroy', $restaurant));

        $response->assertStatus(200);
    }
}
