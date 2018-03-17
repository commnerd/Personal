<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DailyReminder;
use Tests\TestCase;

class DailyReminderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Default test record values
     *
     * @var array
     */
    const TEST_RECORD_ARRAY = [
        'reference' => 'Test Reference',
        'reminder' => 'Test Reminder',
    ];

    /**
     * A basic daily reminder retrieval.
     *
     * @return void
     */
    public function testReminderRetrieval()
    {
        DailyReminder::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('api.daily_reminder.index'));
        $response->assertSuccessful();

        $response->assertJson(self::TEST_RECORD_ARRAY);
    }
}
