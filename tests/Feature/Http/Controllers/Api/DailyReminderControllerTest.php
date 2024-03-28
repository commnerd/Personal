<?php

namespace Http\Controllers\Api;

use App\Models\DailyReminder;
use Tests\Feature\TestCase;

class DailyReminderControllerTest extends TestCase
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
        $response = $this->get(route('api.daily-reminders.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $dailyReminder = DailyReminder::factory()->make();

        $response = $this->post(route('api.daily-reminders.store'), $dailyReminder->toArray());

        $response->assertStatus(200);

        $response->assertJson($dailyReminder->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $dailyReminder = DailyReminder::factory()->create();

        $response = $this->get(route('api.daily-reminders.show', $dailyReminder));

        $response->assertStatus(200);

        $response->assertJson($dailyReminder->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $dailyReminder = DailyReminder::factory()->create();
        $dailyReminderUpdate = DailyReminder::factory()->make();

        $response = $this->put(route('api.daily-reminders.update', $dailyReminder), $dailyReminderUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($dailyReminderUpdate->toArray());
        $response->assertJson(['id' => $dailyReminder->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $dailyReminder = DailyReminder::factory()->create();

        $response = $this->get(route('api.daily-reminders.destroy', $dailyReminder));

        $response->assertStatus(200);
    }
}
