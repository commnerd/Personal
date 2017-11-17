<?php

namespace Tests\Unit\Food;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Food\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    private $vals = [
        'restaurant_id' => 1,
        'active' => 1,
        'label' => '#2',
        'notes' => 'Add onions and extra mayo',
    ];

    /**
     * Ensure name is fillable
     *
     * @return void
     */
    public function testValuesFill()
    {
        $order = new Order();
        $this->assertNotEquals($this->vals['restaurant_id'], $order->restaurant_id);
        $this->assertNotEquals($this->vals['active'], $order->active);
        $this->assertNotEquals($this->vals['label'], $order->label);
        $this->assertNotEquals($this->vals['notes'], $order->notes);

        $order->fill($this->vals);
        $this->assertEquals($this->vals['restaurant_id'], $order->restaurant_id);
        $this->assertEquals($this->vals['active'], $order->active);
        $this->assertEquals($this->vals['label'], $order->label);
        $this->assertEquals($this->vals['notes'], $order->notes);
    }
}
