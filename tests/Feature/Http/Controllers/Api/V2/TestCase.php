<?php

namespace Tests\Feature\Http\Controllers\Api\V2;
 
use Tests\Feature\Http\Controllers\Api\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    const TARGET_CLASS = '';
    const MODEL_SLUG = '';

    /**
     * A basic api index feature test.
     *
     * @return void
     */
    public function test_basic_index()
    {
        $this::TARGET_CLASS::factory()->create();

        $response = $this->get(route('api.v2.'.$this::MODEL_SLUG.'.index'));

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
        $item = $this::TARGET_CLASS::factory()->make();

        $response = $this->post(route('api.v2.'.$this::MODEL_SLUG.'.store'), $item->toArray());

        $this->assertEquals($this::TARGET_CLASS::count(), 1);
    }

    /**
     * A basic api show feature test.
     *
     * @return void
     */
    public function test_basic_show()
    {
        $item = $this::TARGET_CLASS::factory()->create();

        $response = $this->get(route('api.v2.'.$this::MODEL_SLUG.'.show', $item->id));

        $this->assertEquals($item->toArray(), $response->json());
    }

    /**
     * A basic api update feature test.
     *
     * @return void
     */
    public function test_basic_update()
    {
        $item = $this::TARGET_CLASS::factory()->create();
        $idKey = $item->getKeyName();
        $alteredItem = $this::TARGET_CLASS::factory()->make()->toArray();

        $response = $this->put(route('api.v2.'.$this::MODEL_SLUG.'.update', $item->getKey()), $alteredItem);

        $alteredItem[$idKey] = $item->getKey();

        $item = $this::TARGET_CLASS::findOrFail($item->getKey());
        $this->assertEquals($item->toArray(), $response->json());
    }

    /**
     * A basic api destroy feature test.
     *
     * @return void
     */
    public function test_basic_destroy()
    {
        $item = $this::TARGET_CLASS::factory()->create();

        $this->assertEquals(1, $this::TARGET_CLASS::count());

        $response = $this->delete(route('api.v2.'.$this::MODEL_SLUG.'.destroy', $item->getKey()));

        $this->assertEquals(0, $this::TARGET_CLASS::count());
    }
}
