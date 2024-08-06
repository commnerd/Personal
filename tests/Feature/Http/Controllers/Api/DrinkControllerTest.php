<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Drink;
use Tests\Feature\TestCase;

class DrinkControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic index test.
     */
    public function test_empty_index(): void
    {
        $response = $this->get(route('api.drinks.index'));

        $response->assertStatus(200);
        $this->assertEquals(0, $response->baseResponse->original->count());
    }

    /**
     * A basic index test.
     */
    public function test_populated_index(): void
    {
        $drinks = Drink::factory(3)->create();

        $response = $this->get(route('api.drinks.index'));

        $response->assertStatus(200);
        $response->assertSee($drinks->first()->name);
    }

    /**
     * A basic index test.
     */
    public function test_search(): void
    {
        Drink::factory(3)->create();
        Drink::factory()->create(['name' => 'Foobaz']);
        Drink::factory()->create(['recipe' => 'Some Foobaz recipe that I want to see']);

        $response = $this->get(route('api.drinks.index').'?q=Foobaz');

        $response->assertStatus(200);
        $this->assertEquals(2, $response->baseResponse->original->count());
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $drink = Drink::factory()->make();

        $response = $this->post(route('api.drinks.store'), $drink->toArray());

        $response->assertStatus(200);

        $response->assertJson($drink->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $drink = Drink::factory()->create();

        $response = $this->get(route('api.drinks.show', $drink));

        $response->assertStatus(200);

        $response->assertJson($drink->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $drink = Drink::factory()->create();
        $drinkUpdate = Drink::factory()->make();

        $response = $this->put(route('api.drinks.update', $drink), $drinkUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($drinkUpdate->toArray());
        $response->assertJson(['id' => $drink->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $drink = Drink::factory()->create();

        $response = $this->delete(route('api.drinks.destroy', $drink));

        $response->assertStatus(200);
    }
}
