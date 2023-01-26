<?php

namespace Tests\Feature\Http\Controllers\Api\V2;
 
use Tests\Feature\Http\Controllers\Api\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    const TARGET_CLASS = '';

    /**
     * A basic api index feature test.
     *
     * @return void
     */
    public function test_basic_index()
    {
        static::TARGET_CLASS::factory()->create();

        $response = $this->get(route($this->getRouteBaseName().'.index'));

        $this->assertEquals($response->json()['total'], 1);
        $response->assertStatus(200);
    }

    /**
     * A basic api store feature test.
     *
     * @return void
     */
    public function test_basic_store()
    {
        $item = static::TARGET_CLASS::factory()->make();

        $response = $this->post(route($this->getRouteBaseName().'.store'), $item->toArray());

        $this->assertEquals(static::TARGET_CLASS::count(), 1);
    }

    /**
     * A basic api show feature test.
     *
     * @return void
     */
    public function test_basic_show()
    {
        $item = static::TARGET_CLASS::factory()->create();

        $response = $this->get(route($this->getRouteBaseName().'.show', $item->id));

        $this->assertEquals($item->toArray(), $response->json());
    }

    /**
     * A basic api update feature test.
     *
     * @return void
     */
    public function test_basic_update()
    {
        $item = static::TARGET_CLASS::factory()->create();
        $idKey = $item->getKeyName();
        $alteredItem = static::TARGET_CLASS::factory()->make()->toArray();

        $response = $this->put(route($this->getRouteBaseName().'.update', $item->getKey()), $alteredItem);

        $alteredItem[$idKey] = $item->getKey();

        $item = static::TARGET_CLASS::findOrFail($item->getKey());
        $this->assertEquals($item->toArray(), $response->json());
    }

    /**
     * A basic api destroy feature test.
     *
     * @return void
     */
    public function test_basic_destroy()
    {
        $item = static::TARGET_CLASS::factory()->create();

        $this->assertEquals(1, static::TARGET_CLASS::count());

        $response = $this->delete(route($this->getRouteBaseName().'.destroy', $item->getKey()));

        $this->assertEquals(0, static::TARGET_CLASS::count());
    }

    /**
     * Helper to dynamically build route names
     * 
     * @return Route base name
     */
    protected function getRouteBaseName(): string
    {
        return 'api.v2.'.static::TARGET_CLASS::slug(true);
    }
}
