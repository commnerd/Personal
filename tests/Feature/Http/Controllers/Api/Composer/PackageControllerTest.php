<?php

namespace Tests\Feature\Controllers\Api\Composer;

use App\Models\Composer\Package;
use App\Models\Composer\PackageSource;
use Tests\Feature\TestCase;

class PackageControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.composer.packages.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $package = Package::factory()->make();

        $response = $this->post(route('api.composer.packages.store'), $package->toArray());

        $response->assertStatus(200);

        $response->assertJson($package->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $quote = Package::factory()->create();

        $response = $this->get(route('api.composer.packages.show', $quote));

        $response->assertStatus(200);

        $response->assertJson($quote->toArray());
    }

    /**
     * A show test with PackageSources.
     */
    public function test_package_source_show(): void
    {
        $package = Package::factory()->create();

        $sources = PackageSource::factory(2)
            ->create(['composer_package_id' => $package]);

        $response = $this->get(route('api.composer.packages.show', $package));

        $response->assertStatus(200);

        $response->assertJson($package->toArray());

        $response->assertJsonCount(2, "sources");
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $package = Package::factory()->create();
        $packageUpdate = Package::factory()->make();

        $response = $this->put(route('api.composer.packages.update', $package), $packageUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($packageUpdate->toArray());
        $response->assertJson(['id' => $package->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $package = Package::factory()->create();

        $response = $this->get(route('api.composer.packages.destroy', $package));

        $response->assertStatus(200);
    }
}
