<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Mail\ContactMessageNotification;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Tests\TestCase;
use Session;
use Mockery;
use Mail;

class ContactMessageTest extends TestCase
{
    use WithoutMiddleware;

    const MOCK_RECAPTCHA_RESPONSE = 'abcdefg';

    /**
     * Client contact submission
     *
     * @return void
     */
    public function testContactEmailSubmission()
    {
        $postData = [
            'name' => 'Mike Miller',
            'email_phone' => 'commnerd@gmail.com',
            'message' => 'My name is Mike.',
            'g-recaptcha-response' => self::MOCK_RECAPTCHA_RESPONSE,
        ];

        Mail::fake();

        $this->mockSessionFlash();

        $response = $this->post(route('contact.store'), $postData);

        $message = ContactMessage::firstOrFail();

        Mail::assertSent(ContactMessageNotification::class, function ($mail) use ($message) {
            return $mail->msg->id === $message->id;
        });

        $response->assertRedirect(route('home'));

        $this->assertEquals(1, ContactMessage::count());
    }

    /**
     * Client contact submission
     *
     * @return void
     */
    public function testContactPhoneSubmission()
    {
        $postData = [
            'name' => 'Mike Miller',
            'email_phone' => '555-555-5555',
            'message' => 'My name is Mike.',
            'g-recaptcha-response' => self::MOCK_RECAPTCHA_RESPONSE,
        ];

        Mail::fake();

        $this->mockSessionFlash();

        $response = $this->post(route('contact.store'), $postData);

        $message = ContactMessage::firstOrFail();

        Mail::assertNotSent(ContactMessageNotification::class, function ($mail) use ($message) {
            return $mail->msg->id === $message->id;
        });

        $response->assertRedirect(route('home'));

        $this->assertEquals(1, ContactMessage::count());
    }

    public function mockSessionFlash()
    {
        Session::shouldReceive('flash')
            ->once()
            ->andReturn(null);
    }
}
