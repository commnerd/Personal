<?php

namespace Tests\Feature\Http\Controllers\Api\V1;
 
use Tests\Feature\Http\Controllers\Api\TestCase as BaseTestCase;


// use Illuminate\Foundation\Testing\RefreshDatabase;
// use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
// use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;

use GuzzleHttp\Client;
use App\Models\User;
use Artisan;
use Mockery;




abstract class TestCase extends BaseTestCase
{
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
