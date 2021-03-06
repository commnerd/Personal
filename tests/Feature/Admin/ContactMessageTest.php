<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ContactMessage;
use Tests\TestCase;
use Auth;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = Auth::loginUsingId(1);
    }

    public function testEmptyContactMessagesOnIndex()
    {
        $response = $this->get(route('voyager.dashboard'));

        $response->assertSuccessful();

        $response->assertSee('Messages');
    }

    public function testEmptyContactMessagesOnMessageManagement()
    {
        $response = $this->get(route('admin.manage.contact.index'));

        $response->assertSuccessful();

        $response->assertSee('Messages');
        $response->assertSee('No messages.');
    }

    public function testPopulatedContactMessagesOnMessageManagement()
    {
        $message = ContactMessage::create([
            'name' => 'Test Name',
            'email_phone' => 'f1k3k6k2k1k2k3k4k5k1',
            'message' => 'Now is the time for all good men to come to the aid of their country and stuff',
        ]);

        $response = $this->get(route('admin.manage.contact.index'));

        $response->assertSuccessful();

        $response->assertSee('Messages');
        $response->assertSee('Test Name');
    }

    public function testContactMessagesShow()
    {
        $message = ContactMessage::create([
            'name' => 'Test Name',
            'email_phone' => 'f1k3k6k2k1k2k3k4k5k1',
            'message' => 'Now is the time for all good men to come to the aid of their country and stuff',
        ]);

        $response = $this->get(route('admin.manage.contact.show', $message));

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

        $response = $this->delete(route('admin.manage.contact.destroy', $message));

        $response->assertStatus(302);

        $this->assertEquals(0, ContactMessage::count());
    }
}
