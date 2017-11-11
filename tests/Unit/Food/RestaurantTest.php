<?php

namespace Tests\Unit\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Food\Restaurant;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    private $vals = [
        'name' => 'Test Restaurant'
    ];

    /**
     * Ensure name is fillable
     *
     * @return void
     */
    public function testValuesFill()
    {
        $restaurant = new Restaurant();
        $this->assertNotEquals($this->vals['name'], $restaurant->name);

        $restaurant->fill($this->vals);
        $this->assertEquals($this->vals['name'], $restaurant->name);
    }
}
