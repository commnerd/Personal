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
     * A basic empty stats feature test.
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

    /**
     * A basic populated stats feature test.
     */
    public function test_populated_database_stats(): void
    {
        $user = User::where('email', 'commnerd@gmail.com')->first();

        $system = new System();
        $packageCount = rand(1, 10);
        $contactMessageCount = rand(1, 10);
        $drinkCount = rand(1, 10);
        $employmentRecordCount = rand(1, 10);
        $restaurantCount = rand(1, 10);
        $portfolioEntryCount = rand(1, 10);

        \App\Models\Composer\Package::factory()->count($packageCount)->create()->each(function(\App\Models\Composer\Package $package) {
            \App\Models\Composer\PackageSource::factory()->count(rand(1, 10))->create([ 'composer_package_id' => $package->id ]);
        });
        
        \App\Models\ContactMessage::factory()->count($contactMessageCount)->create();
        \App\Models\Drink::factory()->count($drinkCount)->create();
        \App\Models\Work\EmploymentRecord::factory()->count($employmentRecordCount)->create();
        \App\Models\Food\Restaurant::factory()->count($restaurantCount)->create()->each(function(\App\Models\Food\Restaurant $restaurant) {
            \App\Models\Food\Order::factory()->count(rand(0, 10))->create([ 'restaurant_id' => $restaurant->id ]);
        });
        
        \App\Models\Work\PortfolioEntry::factory()->count($portfolioEntryCount)->create();

        $response = $this->actingAs($user)->get('/api/site_stats');

        $response->assertStatus(200);
        $response->assertJson([
            'composer' => [
                'repos' => [
                    'count' => $packageCount,
                ],
            ],
            'contact_messages' => [
                'count' => $contactMessageCount,
            ],
            'drinks' => [
                'count' => $drinkCount,
            ],
            'employment_records' => [
                'count' => $employmentRecordCount,
            ],
            'food' => [
                'restaurants' => [
                    'count' => $restaurantCount,
                ],
            ],
            'portfolio_entries' => [
                'count' => $portfolioEntryCount,
            ],
            'system' => [
                'os' => $system->getOs(),
                'uptime' => $system->getUptime(),
                'disk_usage' => $system->getDiskUsage(),
            ],
        ]);
    }
}
