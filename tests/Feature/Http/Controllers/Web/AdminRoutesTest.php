<?php

namespace Tests\Feature\Http\Controllers\Web;

use Tests\Feature\TestCase;

class AdminRoutesTest extends TestCase
{
    /**
     * A basic page load test.
     */
    public function test_simple_page_load(): void
    {
        $adminRoutes = [
            '/admin/blog',
            '/admin/composer',
            '/admin/drinks',
            '/admin/messages',
            '/admin/quotes',
            '/admin/reminders',
            '/admin/restaurants',
            '/admin/resume',
        ];

        foreach($adminRoutes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $response->assertSee('app-root');
        }
        
    }
}
