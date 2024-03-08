<?php

namespace Tests\Feature\Http\Controllers\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ErroneousRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_four_oh_four(): void
    {
        $response = $this->get('/foo');

        $response->assertStatus(404);
    }
}
