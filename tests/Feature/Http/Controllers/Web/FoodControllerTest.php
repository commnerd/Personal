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
     * A single order search result test
     */
    public function test_single_search_result_redirect(): void
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
}
