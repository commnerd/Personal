<?php

namespace Tests\Feature\Http\Controllers\Api;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\System;
use Tests\Feature\TestCase;

class SiteStatsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_empty_database_stats(): void
    {
        $user = User::where('email', 'commnerd@gmail.com')->first();

        $system = new System();

        $response = $this->actingAs($user)->get('/api/site_stats');

        $response->assertStatus(200);
        $response->assertJson([
            'composer' => [
                'repos' => [
                    'count' => 0,
                ],
                'sources' => [
                    'count' => 0,
                ],
            ],
            'contact_messages' => [
                'count' => 0,
            ],
            'drinks' => [
                'count' => 0,
            ],
            'employment_records' => [
                'count' => 0,
            ],
            'food' => [
                'restaurants' => [
                    'count' => 0,
                ],
                'orders' => [
                    'count' => 0,
                ]
            ],
            'portfolio_entries' => [
                'count' => 0,
            ],
            'system' => [
                'os' => $system->getOs(),
                'uptime' => $system->getUptime(),
                'disk_usage' => $system->getDiskUsage(),
            ],
        ]);
    }
}
