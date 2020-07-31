<?php

namespace Tests\Feature\Api\V1;

use App\Models\Reminder;
use Tests\TestCase;

class ReminderTest extends TestCase
{
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
     * A basic reminder listing.
     *
     * @return void
     */
    public function testReminderPagedRetrieval()
    {
        Reminder::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('api.v1.reminders.index'));
        $response->assertSuccessful();

        $response->assertJson([ "data" => [self::TEST_RECORD_ARRAY]]);
    }

    /**
     * A basic reminder retrieval.
     *
     * @return void
     */
    public function testReminderShowRetrieval()
    {
        $reminder = Reminder::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('api.v1.reminders.show', $reminder));
        $response->assertSuccessful();

        $response->assertJson(self::TEST_RECORD_ARRAY);
    }
}
