<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ContactMessage;
use Tests\TestCase;
use Mockery;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up test
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        // Pass ReCaptcha
        $recaptchaJsonResponse = json_encode([
            "success" => true,
            "challenge_ts" => "2018-02-17T06:10:13Z",
            "hostname" => "localhost",
        ]);

        $stream = Mockery::mock('overload:GuzzleHttp\Psr7\Stream');
        $stream->shouldReceive('getContents')->andReturn($recaptchaJsonResponse);

        $response = Mockery::mock('overload:GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->andReturn($stream);

        $client = Mockery::instanceMock('overload:GuzzleHttp\Client');
        $client->shouldReceive('post')->withArgs([env('GOOGLE_RECAPTCHA_TARGET'), [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => 'abcdefg',
            ]
        ]])->andReturn($response);
    }

    /**
     * Client contact submission
     *
     * @return void
     */
    public function testContactSubmission()
    {
        $postData = [
            'name' => 'Mike Miller',
            'email_phone' => 'commnerd@gmail.com',
            'message' => 'My name is Mike.',
            'g-recaptcha-response' => 'abcdefg',
        ];

        $response = $this->post(route('contact.store'), $postData);

        $response->assertRedirect(route('home'));

        $this->assertEquals(1, ContactMessage::count());
    }
}
