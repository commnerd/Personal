<?php

namespace Tests\Feature\Api\Food;

use Tests\Feature\Api\AuthenticatedResourceControllerTest;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Food\Restaurant;
use App\Models\Model;

class RestaurantControllerTest extends AuthenticatedResourceControllerTest
{
    /**
     * Test restaurant description array
     *
     * @var array
     */
    public static $testArray = [
        'name' => "Test Restaurant",
    ];

    /**
     * The test class for this test suite
     *
     * @var string
     */
    protected $testClass = Restaurant::class;

    /**
     * Base route for resource
     *
     * @var string
     */
    protected $resourceBaseRoute = "/api/food/restaurants";

    /**
     * Create test object
     *
     * @return \App\Models\Model
     */
    protected function createObject(): Model
    {
        return Restaurant::create(self::$testArray);
    }

    /**
     * Get a legitimate update array
     *
     * @return array Array to update object
     */
    protected function getUpdateArray(): array
    {
        return [
            'name' => 'Test 2',
        ];
    }
}
