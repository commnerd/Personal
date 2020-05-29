<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\DailyReminder;
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
    protected function setUp(): void
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
        $response = $this->get(route('admin.manage.daily_reminder.create'));
        $response->assertSuccessful();

        $response->assertSee('Create Daily Reminder');
        $response->assertSee('<input type="text" name="reference" value="" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="reminder"></div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for daily reminder entry creation
     *
     * @return void
     */
    public function testDailyReminderCreation()
    {
        $response = $this->post(route('admin.manage.daily_reminder.store'), self::TEST_RECORD_ARRAY);
        $response->assertRedirect(route('admin.manage.daily_reminder.index'));

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
        $response = $this->delete(route('admin.manage.daily_reminder.destroy', $record));

        $response->assertRedirect(route('admin.manage.daily_reminder.index'));
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
        $response = $this->get(route('admin.manage.daily_reminder.edit', [$reminder]));

        $response->assertSee('Edit Daily Reminder');
        $response->assertSee('<input type="text" name="reference" value="Test Reference" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="reminder">Test Reminder</div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for the daily reminder entry creation page
     *
     * @return void
     */
    public function testDailyReminderUpdate()
    {
        $reminder = DailyReminder::create(self::TEST_RECORD_ARRAY);

        $response = $this->put(route('admin.manage.daily_reminder.update', [$reminder->id]), [
            'reference' => 'Test Reference change',
            'reminder' => 'Test Reminder change',
        ], ['HTTP_REFERER' => route('admin.manage.daily_reminder.index')]);

        $response->assertRedirect(route('admin.manage.daily_reminder.index'));


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
        $response = $this->get(route('admin.manage.daily_reminder.index'));
        $response->assertSuccessful();
        $response->assertSee('No Reminders');

        $reminder = DailyReminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.manage.daily_reminder.index'));
        $response->assertSuccessful();
        $response->assertSee($reminder->reference);
        $response->assertSee($reminder->reminder);
    }
}
