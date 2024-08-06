<?php

namespace Tests\Feature\Http\Controllers\Api\Composer;

use App\Models\Composer\{Package,PackageSource};
use Tests\Feature\TestCase;

class PackageSourceControllerTest extends TestCase
{
    private $parentPackage;


    public function setUp(): void
    {
        parent::setUp();
        $this->login();
        $this->parentPackage = Package::factory()->create();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.composer.package_sources.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $package_source = PackageSource::factory()->make(['composer_package_id' => $this->parentPackage->id]);

        $response = $this->post(route('api.composer.package_sources.store', $this->parentPackage), $package_source->toArray());

        $response->assertStatus(200);

        $response->assertJson($package_source->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $package_source = PackageSource::factory()->create(['composer_package_id' => $this->parentPackage->id]);

        $response = $this->get(route('api.composer.package_sources.show', $package_source));

        $response->assertStatus(200);

        $response->assertJson($package_source->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $package_source = PackageSource::factory()->create(['composer_package_id' => $this->parentPackage->id]);
        $package_source_update = PackageSource::factory()->make();

        $response = $this->put(route('api.composer.package_sources.update', $package_source), $package_source_update->toArray());

        $response->assertStatus(200);
        $response->assertJson($package_source_update->toArray());
        $response->assertJson(['id' => $package_source->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $package_source = PackageSource::factory()->create(['composer_package_id' => $this->parentPackage->id]);

        $response = $this->delete(route('api.composer.package_sources.destroy', $package_source));

        $response->assertStatus(200);
    }
}
