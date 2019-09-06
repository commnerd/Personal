<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Artisan;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        Artisan::call('migrate',['-vvv' => true]);
        Artisan::call('passport:install',['-vvv' => true]);
        Artisan::call('db:seed',['-vvv' => true]);
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
