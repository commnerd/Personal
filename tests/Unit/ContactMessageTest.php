<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ContactMessage;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    /**
     * Phone conversion test
     *
     * @return void
     */
    public function testPhoneConversion()
    {
        $contact = new ContactMessage([
            'name' => 'Test Name',
            'email_phone' => 'f1k3k6k2k1k2k3k4k5k1',
            'message' => 'Now is the time for all good men to come to the aid of their country and stuff',
        ]);

        $this->assertSame('136-212-3451', $contact->email_phone);
    }

    /**
     * Phone conversion test
     *
     * @return void
     */
    public function testEmailSetAndRecall()
    {
        $contact = new ContactMessage([
            'name' => 'Test Name',
            'email_phone' => 'test123@test.com',
            'message' => 'Now is the time for all good men to come to the aid of their country and stuff',
        ]);

        $this->assertSame('test123@test.com', $contact->email_phone);
    }
}
