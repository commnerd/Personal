<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ContactMessage;
use Tests\TestCase;
use Auth;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    public function testEmptyContactMessagesOnIndex()
    {
        $response = $this->get(route('admin.index'));

        $response->assertSuccessful();

        $response->assertSee('Messages');
        $response->assertSee('No new messages.');
    }

    public function testEmptyContactMessagesOnMessageManagement()
    {
        $response = $this->get(route('admin.contact.index'));

        $response->assertSuccessful();

        $response->assertSee('Messages');
        $response->assertSee('No messages.');
    }

    public function testContactMessagesShow()
    {
        $message = ContactMessage::create([
            'name' => 'Test Name',
            'email_phone' => 'f1k3k6k2k1k2k3k4k5k1',
            'message' => 'Now is the time for all good men to come to the aid of their country and stuff',
        ]);

        $response = $this->get(route('admin.contact.show', $message));

        $response->assertSuccessful();

        $response->assertSee('Message - From: Test Name (136-212-3451)');
        $response->assertSee('Now is the time for all good men to come to the aid of their country and stuff');
    }

    public function testContactMessagesDelete()
    {
        $message = ContactMessage::create([
            'name' => 'Test Name',
            'email_phone' => 'f1k3k6k2k1k2k3k4k5k1',
            'message' => 'Now is the time for all good men to come to the aid of their country and stuff',
        ]);

        $response = $this->delete(route('admin.contact.destroy', $message));

        $response->assertStatus(302);

        $this->assertEquals(0, ContactMessage::count());
    }
}
