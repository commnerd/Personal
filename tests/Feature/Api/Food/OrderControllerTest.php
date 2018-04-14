<?php

namespace Tests\Feature\Api\Food;

use Tests\Feature\Api\AuthenticatedResourceControllerTest;
use Illuminate\Foundation\Testing\WithFaker;
use App\Food\Restaurant;
use App\Food\Order;
use App\Model;

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
    protected $resourceBaseRoute = "/api/food/restaurants";

    public function setUp()
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
