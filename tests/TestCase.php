<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use TCG\Voyager\Facades\Voyager;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;

use GuzzleHttp\Client;
use App\Models\User;
use Artisan;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();

        $user = User::findOrFail(1);

        Artisan::call('voyager:admin '.$user->email);

        $user = User::findOrFail(1);

        $user->role->permissions()->create([
            'key' => 'browse_admin',
        ]);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    protected function mockGuzzleResponse($responseData, $statusCode)
    {
        $headers = ['Content-Type' => 'application/json'];
        $body = json_encode($responseData);

        $response = new Response($statusCode, $headers, $body);

        $mock = new MockHandler([
            $response
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        //client instance is bound to the mock here.
        $this->app->instance(Client::class, $client);

        return $response;
    }
}
