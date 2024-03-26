<?php

namespace Tests\Feature\Http\Controllers\Web;

use App\Models\Composer\{Package,PackageSource};
use Tests\Feature\TestCase;

class ComposerPackagesControllerTest extends TestCase
{
    /**
     * Test basic packages.json functionality
     *
     * @return void
     */
    public function testPackagesJson()
    {
        $package = Package::create([
            "name" => "test/package",
            "version" => "dev-master",
            "type" => Package::TYPE_PROJECT,
        ]);
        PackageSource::create([
            'composer_package_id' => $package->id,
            "reference" => "882816c7c05b5b5704e84bdb0f7ad69230df3c0c",
            "type" => "git",
            "url" => "https://test.com",
        ]);
        $response = $this->get(route('web.composer-packages.index'));
        $response->assertSuccessful();
        $response->assertJson([
            "packages" => [
                "test/package" => [
                    "dev-master" => [
                        "name" => "test/package",
                        "version" => "dev-master",
                        "type" => Package::TYPE_PROJECT,
                        "source" => [
                            "reference" => "882816c7c05b5b5704e84bdb0f7ad69230df3c0c",
                            "type" => "git",
                            "url" => "https://test.com",
                        ],
                    ],
                ],
            ],
        ]);
    }
}
