<?php

namespace Http\Controllers\Api;

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
    public function test_index(): void
    {
        $response = $this->get(route('api.drinks.index'));

        $response->assertStatus(200);
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

        $response = $this->get(route('api.drinks.destroy', $drink));

        $response->assertStatus(200);
    }
}
