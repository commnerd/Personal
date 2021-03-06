<?php

namespace Tests\Feature\Api\V1\Food;

use Tests\Feature\Api\V1\AuthenticatedResourceControllerTest;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Food\Restaurant;
use App\Models\Food\Order;
use App\Models\Model;

class OrderControllerTest extends AuthenticatedResourceControllerTest
{
    /**
     * Test order description
     *
     * @var array
     */
    public static $testArray = [
        'label' => '#1',
        'notes' => 'Test notes',
    ];

    /**
     * The test class for this test suite
     *
     * @var string
     */
    protected $testClass = Order::class;

    private $restaurant;

    /**
     * Base route for resource
     *
     * @var string
     */
    protected $resourceBaseRoute = "/api/v1/food/restaurants";

    protected function setUp(): void
    {
        parent::setUp();

        $restaurantTest = RestaurantControllerTest::$testArray;
        $this->restaurant = Restaurant::create(RestaurantControllerTest::$testArray);
        $this->resourceBaseRoute .= "/".$this->restaurant->id."/orders";
        self::$testArray['restaurant_id'] = $this->restaurant->id;
    }

    /**
     * Create test object
     *
     * @return \App\Model
     */
    protected function createObject(): Model
    {
        $testArray = self::$testArray;
        return Order::create($testArray);
    }

    /**
     * Get a legitimate update array
     *
     * @return array Array to update object
     */
    protected function getUpdateArray(): array
    {
        return [
            'label' => '#2',
            'notes' => 'Test notes 2',
        ];
    }
}
