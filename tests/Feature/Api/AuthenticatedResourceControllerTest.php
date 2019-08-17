<?php

namespace Tests\Feature\Api;

use Tests\Feature\Api\AuthenticatedResourceControllerTest;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Model;
use App\Models\User;
use JWTAuth;

abstract class AuthenticatedResourceControllerTest extends TestCase
{
    /**
     * JWT for accessing API endpoints
     *
     * @var string
     */
    private $jwtToken;

    /**
     * Base route for resource
     *
     * @var string
     */
    protected $resourceBaseRoute;

    /**
     * The default class to test against
     *
     * @var string
     */
     protected $testClass;

     /**
      * Ensure derivative classes implement createObject() function
      *
      * @return App\Models\Model
      */
     protected abstract function createObject(): Model;

     /**
      * Method for retreiving a legitimate update array
      *
      * @return array
      */
     protected abstract function getUpdateArray(): array;

    /**
     * Setup for api resource test
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::findOrFail(1);
        $this->jwtToken = JWTAuth::fromUser($user);
        $this->defaultHeaders['Authorization'] = "Bearer $this->jwtToken";
    }

    /**
     * Setup for api resource test
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

    }

    /**
     * Test to ensure test class is set up correctly
     *
     * @return void
     */
    public function testTestClassSetup()
    {
        $this->assertNotEquals(null, $this->resourceBaseRoute, "The base route is not set.");

        $this->assertNotNull(get_class($this)::$testArray);
    }

    /**
     * Test to ensure there are no resource routes for edit or create
     *
     * @return void
     */
    public function testNoEditOrCreationResourceRoutes() {
        $response = $this->get($this->resourceBaseRoute."/create");

        $response->assertStatus(404);

        $response = $this->get($this->resourceBaseRoute."/1/edit");

        $response->assertStatus(404);
    }

    /**
     * Test index API call
     */
    public function testIndex() {
        $this->initObject();

        $response = $this->get($this->resourceBaseRoute);

        $response->assertSuccessful();

        $response->assertJson(['data' => [get_class($this)::$testArray]]);
    }

    /**
     * Test show API call
     */
    public function testShow() {
        $obj = $this->initObject();

        $response = $this->get($this->resourceBaseRoute.'/'.$obj->id);

        $response->assertSuccessful();

        $response->assertJson(get_class($this)::$testArray);
    }

    /**
     * Test store API call
     */
    public function testStore() {
        $this->assertEmpty($this->testClass::all());

        $response = $this->post(
            $this->resourceBaseRoute,
            get_class($this)::$testArray
        );

        $response->assertSuccessful();

        $response->assertJson(get_class($this)::$testArray);
    }


    /**
     * Test update API call
     */
    public function testUpdate() {
        $obj = $this->initObject();
        $id = $obj->id;
        $update = $this->getUpdateArray();

        $response = $this->put(
            $this->resourceBaseRoute.'/'.$id,
            $update
        );

        $response->assertSuccessful();

        $obj = get_class($obj)::findOrFail($id);

        foreach($update as $key => $value) {
            $this->assertEquals($value, $obj->{$key});
        }
    }

    /**
     * Test destroy API call
     */
    public function testDestroy() {
        $obj = $this->initObject();

        $this->assertNotEmpty($this->testClass::findOrFail($obj->id));

        $this->delete($this->resourceBaseRoute.'/'.$obj->id);

        $this->assertEmpty($this->testClass::find($obj->id));
    }

    private function initObject(): Model {
        $obj = $this->createObject();

        $this->assertNotNull($obj);

        return $obj;
    }
}
