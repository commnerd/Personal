<?php

namespace Tests\Feature\Http\Controllers\Web;

use App\Models\Food\{Restaurant, Order};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TestCase;

class FoodControllerTest extends TestCase
{
    /**
     * A basic page load test.
     */
    public function test_simple_page_load(): void
    {
        $response = $this->get(route('web.food'));

        $response->assertStatus(200);
    }

    /**
     * An initial page load with no search should return no results
     */
    public function test_initial_no_search_emptiness(): void
    {
        Restaurant::factory()->times(2)->create()->each(function($restaurant) {
            $order = Order::factory()->times(2)->create([
                'restaurant_id' => $restaurant->id,
            ]);
        });

        $response = $this->get(route('web.food'));
        
        $response->assertDontSee(Order::inRandomOrder()->first()->label);
        $response->assertSee('Please search for a meal name, an ingredient, or a restaurant name.');
    }

    /**
     * Test empty query results
     */
    public function test_empty_query_results(): void
    {
        $response = $this->get(route('web.food', ['q' => 'Test']));
        
        $response->assertDontSee('Please search for a meal name, an ingredient, or a restaurant name.');
        $response->assertSee('Sorry, no results found for this search.');
    }

    /**
     * A single restaurant search result test
     */
    public function test_single_restaurant_search_result_redirect(): void
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->get(route('web.food', ['q' => $restaurant->name]));
        $response->assertRedirectToRoute('web.food.restaurant', $restaurant->id);
    }

    /**
     * A single order search result test
     */
    public function test_single_order_search_result_redirect(): void
    {
        $orderId = 0;
        Restaurant::factory()->create()->each(function($restaurant) use (&$orderId) {
            $order = Order::factory()->create([
                'restaurant_id' => $restaurant->id,
                'label' => 'Test Order'
            ]);
            $orderId = $order->id;
        });
        $response = $this->get(route('web.food', ['q' => 'Test']));
        $response->assertRedirectToRoute('web.food.order', $orderId);
    }

    /**
     * A single order search result test
     */
    public function test_restaurant_and_order_search_results(): void
    {
        Restaurant::factory()->create([
            'name' => 'Test Restaurant',
        ])->each(function($restaurant) {
            Order::factory()->create();
        });


        Restaurant::factory()->create()->each(function($restaurant) {
            Order::factory()->create([
                'restaurant_id' => $restaurant->id,
                'label' => 'Test Order'
            ]);
        });

        $restaurant = Restaurant::first();
        $response = $this->get(route('web.food', ['q' => 'Test']));
        $response->assertSee(route('web.food.restaurant', $restaurant->id));
        $response->assertSee($restaurant->name);
        $response->assertSee(route('web.food.order', Order::where('label', 'like', '%Test%')->first()->id));
        $response->assertSee(Order::where('label', 'like', '%Test%')->first()->name);
    }
}
