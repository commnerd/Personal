<?php

namespace Tests\Feature\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Food\Restaurant;
use Tests\TestCase;
use App\Food\Order;
use Auth;

class SearchFoodTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup tests
     */
    public function setUp() {
        parent::setUp();

        $restaurant = Restaurant::create([
            'name' => 'Test Restaurant 1',
        ]);

        Order::create([
            'restaurant_id' => $restaurant->id,
            'label' => 'Test Order 1',
            'notes' => 'Test Order 1 Notes',
        ]);

        $restaurant = Restaurant::create([
            'name' => 'Test Restaurant 2',
        ]);

        Order::create([
            'restaurant_id' => $restaurant->id,
            'label' => 'Test Order 2',
            'notes' => 'Test Order 2 Notes',
        ]);

        Auth::loginUsingId(1);
    }

    /**
     * Test unauthenticated search
     *
     * @return void
     */
    public function testUnauthenticatedSearch()
    {
        Auth::logout();

        $response = $this->get('/food', ['term' => 'Restaurant']);

        $response->assertStatus(302);
    }

    /**
     * Search empty food search results
     *
     * @return void
     */
    public function testEmptyFoodSearch()
    {
        $response = $this->get('/food', ['term' => 'Bilbo']);

        $response->assertSuccessful();

        $response->assertSee('Nothing Found.');
    }

    /**
     * Search multiple food search restaurant results
     *
     * @return void
     */
    public function testMultipleFoodSearchRestaurantResults()
    {
        $response = $this->get('/food?term=Restaurant');

        $response->assertSuccessful();

        $response->assertSee('Test Restaurant 1');
        $response->assertSee('Test Restaurant 2');
    }

    /**
     * Search single food search restaurant result
     *
     * @return void
     */
    public function testSingleFoodSearchRestaurantResult()
    {
        $response = $this->get('/food?term=Restaurant+1');

        $response->assertStatus(302);

        $response->assertRedirect('/food/restaurants/1');
    }

    /**
     * Search multiple food search order results
     *
     * @return void
     */
    public function testMultipleFoodSearchOrderResults()
    {
        $response = $this->get('/food?term=order');

        $response->assertSuccessful();

        $response->assertSee('Test Order 1');
        $response->assertSee('Test Order 2');

        $response->assertDontSee('Notes');
    }

    /**
     * Search single food search order result
     *
     * @return void
     */
    public function testSingleFoodSearchOrderResult()
    {
        $response = $this->get('/food?term=order+1');

        $response->assertStatus(302);

        $response->assertRedirect('/food/restaurants/1');

    }
}
