<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use App\Facades\SystemStats;
use Tests\TestCase as BaseTestCase;

class SystemSpecsTest extends BaseTestCase
{
    /**
     * A basic api index feature test.
     *
     * @return void
     */
    public function test_basic_index()
    {
        $response = $this->get(route('api.v2.system-spec.index'));

        $this->assertEquals($response->json(), [
            'os' => SystemStats::getOS(),
            'disk_usage' => SystemStats::getDiskUsage(),
            'uptime' => SystemStats::getUptime(),
        ]);
        
        $response->assertStatus(200);
    }
}