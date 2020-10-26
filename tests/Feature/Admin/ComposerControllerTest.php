<?php

namespace Tests\Feature\Admin;

use App\Models\ComposerPackageSource;
use App\Models\ComposerPackage;
use Tests\TestCase;
use Auth;

class ComposerControllerTest extends TestCase
{
    const TEST_PACKAGE = [
        "name" => "test/package",
        "version" => "dev-master",
        "type" => ComposerPackage::TYPE_PROJECT,
    ];

    const TEST_PACKAGE_SOURCE = [
        "reference" => "882816c7c05b5b5704e84bdb0f7ad69230df3c0c",
        "type" => "git",
        "url" => "https://test.com",
    ];

    /**
     * Setup tests
     */
    public function setUp(): void {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * Test package index page
     *
     * @return void
     */
     public function testGetPackageIndexPage()
     {
        ComposerPackage::create(self::TEST_PACKAGE);

        $response = $this->get(route("admin.manage.composer.index"));

        $response->assertSuccessful();

        $response->assertSee(self::TEST_PACKAGE["name"]);
        $response->assertSee(self::TEST_PACKAGE["version"]);
        $response->assertSee(ComposerPackage::TYPES[self::TEST_PACKAGE["type"]]);

        $response->assertSee('<a class="glyphicon glyphicon-plus" href="'.route("admin.manage.composer.packages.create").'"></a>', false);

        $response->assertSee('<a class="glyphicon glyphicon-edit" href="'.route("admin.manage.composer.packages.edit", 1).'"></a>', false);

        $response->assertSee('<a href="'.route("admin.manage.composer.packages.show", 1).'">'.self::TEST_PACKAGE["name"].'</a>', false);
     }

     /**
      * Test package create page
      *
      * @return void
      */
     public function testGetPackageCreationPage()
     {
        $response = $this->get(route("admin.manage.composer.packages.create"));

        $response->assertSuccessful();

        $response->assertSee('Create a Composer Package');

        $response->assertSee('<select name="type"', false);

        $response->assertSee('<input type="text" name="name"', false);

        $response->assertSee(view('shared.form.submit'));
     }

     /**
      * Test Package Store Call
      *
      * @return void
      */
     public function testPostPackageCreation()
     {
        $package = $this->getPackageSubmission();

        $response = $this->post(route("admin.manage.composer.packages.store"), $package);

        $response->assertStatus(302);

        $this->assertEquals(1, ComposerPackage::count());
     }

     /**
      * Test package show page
      *
      * @return void
      */
     public function testGetPackageShowPage()
     {
        $package = $this->initPackage();

        $response = $this->get(route("admin.manage.composer.packages.show", $package));

        $response->assertSuccessful();

        $response->assertSee(self::TEST_PACKAGE["name"]);

        $response->assertDontSee(view('shared.form.submit'));
     }

     /**
      * Test invalid package store call
      *
      * @return void
      */
     public function testPostInvalidPackageCreation()
     {
        $response = $this->post(route("admin.manage.composer.packages.store", ["name" => ""]));

        $response->assertStatus(302);

        $this->assertEquals(0, ComposerPackage::count());
     }

     /**
      * Test get drink update page
      *
      * @return void
      */
     public function testGetPackageEditPage()
     {
        $package = ComposerPackage::create(self::TEST_PACKAGE);

        $response = $this->get(route("admin.manage.composer.packages.edit", $package));

        $response->assertSuccessful();

        $response->assertSee('Edit Package (test/package)');

        $response->assertSee('<input type="text" name="name"', false);

        $response->assertSee('<select name="type"', false);

        $response->assertSee(view('shared.form.submit'));
     }

     /**
      * Test updating a package
      *
      * @return void
      */
     public function testPutPackageUpdate()
     {
        $package = $this->initPackage();
        $post = $this->getPackageSubmission();
        $post['name'] = 'test2/package';
        $post['type'] = $package::TYPE_LIBRARY;

        $response = $this->put(route("admin.manage.composer.packages.update", $package), $post);
        $response->assertStatus(302);

        $updatedPackage = ComposerPackage::findOrFail($package->id);
        $this->assertEquals("test2/package", $updatedPackage->name);
        $this->assertEquals($package::TYPE_LIBRARY, $updatedPackage->type);
     }

     public function testDeletePackage()
     {
        $package = ComposerPackage::create(self::TEST_PACKAGE);

        $response = $this->delete(route("admin.manage.composer.packages.destroy", $package));

        $response->assertStatus(302);

        $this->assertEquals(0, ComposerPackage::count());
     }

     /**
      * Test redirect when logged out
      *
      * @return null
      */
     public function testRedirectWhenLoggedOut()
     {
        Auth::logout();

        $response = $this->get(route("admin.manage.composer.index"));

        $response->assertRedirect(route('login'));
     }

     private function initPackage(): ComposerPackage
     {
        $package = ComposerPackage::create(self::TEST_PACKAGE);
        ComposerPackageSource::create(array_merge(
            ['composer_package_id' => $package->id],
            self::TEST_PACKAGE_SOURCE
        ));
        return ComposerPackage::firstOrFail();
     }

     private function getPackageSubmission(): array
     {
         $submission = self::TEST_PACKAGE;
         $submission["source_reference"] = self::TEST_PACKAGE_SOURCE['reference'];
         $submission["source_type"] = self::TEST_PACKAGE_SOURCE['type'];
         $submission["source_url"] = self::TEST_PACKAGE_SOURCE['url'];
         return $submission;
     }
}
