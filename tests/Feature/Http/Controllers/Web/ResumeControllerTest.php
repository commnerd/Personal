<?php

namespace Tests\Feature\Http\Controllers\Web;

use Tests\Feature\TestCase;

class ResumeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get(route('web.resume'));

        $response->assertStatus(200);
        $response->assertSee('resume.pdf');
    }
}
