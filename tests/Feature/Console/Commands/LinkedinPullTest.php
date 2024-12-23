<?php

namespace Tests\Feature\Console\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\{Artisan,Http};
use Tests\TestCase;

class LinkedinPullTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pull(): void
    {
        $response = $this->getLinkedinTestResponse();
        $responseData = json_decode($response->body())->data;

        $httpMock = Http::partialMock();
        Http::shouldReceive('withHeader')->times(2)->andReturn($httpMock);
        Http::shouldReceive('get')->andReturn($this->getLinkedinTestResponse());
        
        Http::shouldReceive('withHeader')->times(sizeof($responseData->experiences) * 3)->andReturn($httpMock);
        Http::shouldReceive('post')->andReturn(new HttpCall('{"result": "* 1234"}'));

        Artisan::call('linkedin:pull');

    }

    private function getLinkedinTestResponse(): HttpCall
    {
        $d = DIRECTORY_SEPARATOR; // $d = Delimiter

        $path = 'tests'.$d.'Feature'.$d.'Console'.$d.'Commands'.$d.'linkedin_reply.txt';

        return new HttpCall(file_get_contents(base_path($path)));
    }
}

class HttpCall {

    private $_response;

    public function __construct(string $response)
    {
        $this->_response = $response;
    }

    public function body(): string
    {
        return $this->_response;
    }
}
