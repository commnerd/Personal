<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DailyReminder;
use Tests\TestCase;
use Auth;

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
     * Setup for admin access
     */
    public function setUp()
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * A test for the daily reminder entry creation page
     *
     * @return void
     */
    public function testDailyReminderCreationPage()
    {
        $response = $this->get(route('admin.daily_reminder.create'));
        $response->assertSuccessful();

        $response->assertSee('Create Daily Reminder');
        $response->assertSee('<input type="text" name="reference" value="" class="form-control">');
        $response->assertSee('<textarea name="reminder" class="form-control"></textarea>');
        $response->assertSee('<input class="btn btn-default" type="submit" />');
    }

    /**
     * A test for daily reminder entry creation
     *
     * @return void
     */
    public function testDailyReminderCreation()
    {
        $response = $this->post(route('admin.daily_reminder.store'), self::TEST_RECORD_ARRAY);
        $response->assertRedirect(route('admin.daily_reminder.index'));

        $record = DailyReminder::where('reference', 'Test Reference')->firstOrFail();
        $this->assertEquals($record->reminder, 'Test Reminder');
    }

    /**
     * A test for the daily reminder entry deletion
     *
     * @return void
     */
    public function testDailyReminderDeletion()
    {
        $record = DailyReminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->delete(route('admin.daily_reminder.destroy', $record));

        $response->assertRedirect(route('admin.daily_reminder.index'));
        $this->assertEmpty(DailyReminder::all());
    }

    /**
     * A test for the daily reminder entry edit page
     *
     * @return void
     */
    public function testDailyReminderEditPage()
    {
        $reminder = DailyReminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.daily_reminder.edit', ['dailyReminder' => $reminder]));

        $response->assertSee('Edit Daily Reminder');
        $response->assertSee('<input type="text" name="reference" value="Test Reference" class="form-control">');
        $response->assertSee('<textarea name="reminder" class="form-control">Test Reminder</textarea>');
        $response->assertSee('<input class="btn btn-default" type="submit" />');
    }

    /**
     * A test for the daily reminder entry creation page
     *
     * @return void
     */
    public function testDailyReminderUpdate()
    {
        $reminder = DailyReminder::create(self::TEST_RECORD_ARRAY);

        $response = $this->put(route('admin.daily_reminder.update', ['id' => $reminder->id]), [
            'reference' => 'Test Reference change',
            'reminder' => 'Test Reminder change',
        ], ['HTTP_REFERER' => route('admin.daily_reminder.index')]);

        $response->assertRedirect(route('admin.daily_reminder.index'));

        $reminder = DailyReminder::findOrFail($reminder->id);

        $this->assertEquals($reminder->reference, 'Test Reference change');
        $this->assertEquals($reminder->reminder, 'Test Reminder change');
    }

    /**
     * A test for the daily reminder index page
     *
     * @return void
     */
    public function testDailyReminderIndexPage()
    {
        $response = $this->get(route('admin.daily_reminder.index'));
        $response->assertSuccessful();
        $response->assertSee('No Reminders');

        $reminder = DailyReminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.daily_reminder.index'));
        $response->assertSuccessful();
        $response->assertSee($reminder->reference);
        $response->assertSee($reminder->reminder);
    }
}
