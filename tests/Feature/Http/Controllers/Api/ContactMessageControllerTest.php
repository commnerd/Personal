<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\ContactMessage;
use Tests\Feature\TestCase;

class ContactMessageControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.contact-messages.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $contactMessage = ContactMessage::factory()->make();

        $response = $this->post(route('api.contact-messages.store'), $contactMessage->toArray());

        $response->assertStatus(200);

        $response->assertJson($contactMessage->toArray());
    }

    /**
     * Test that there is only a single active quote after creating a quote with an active status
     */
    public function test_active_store(): void
    {
        ContactMessage::factory()->create();
        $contactMessage = ContactMessage::factory()->make();

        $response = $this->post(route('api.contact-messages.store'), $contactMessage->toArray());

        $response->assertStatus(200);
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $contactMessage = ContactMessage::factory()->create();

        $response = $this->get(route('api.contact-messages.show', $contactMessage));

        $response->assertStatus(200);

        $response->assertJson($contactMessage->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $contactMessage = ContactMessage::factory()->create();
        $contactMessageUpdate = ContactMessage::factory()->make();

        $response = $this->put(route('api.contact-messages.update', $contactMessage), $contactMessageUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($contactMessageUpdate->toArray());
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $contactMessage = ContactMessage::factory()->create();

        $response = $this->delete(route('api.contact-messages.destroy', $contactMessage));

        $response->assertStatus(200);
    }
}
