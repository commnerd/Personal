<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Reminder;
use Tests\TestCase;
use Auth;

class ReminderTest extends TestCase
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
     * A test for the reminder entry creation page
     *
     * @return void
     */
    public function testInitialReminderCreationPage()
    {
        $response = $this->get(route('admin.manage.reminder.create'));
        $response->assertSuccessful();

        $response->assertSee('Create Reminder');
        $response->assertSee('<input type="text" name="reference" value="" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="reminder"></div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for the reminder entry creation page after the table has entries in it
     *
     * @return void
     */
    public function testPopulatedReminderCreationPage()
    {
        $record = Reminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.manage.reminder.create'));
        $response->assertSuccessful();

        $response->assertSee('Create Reminder');
        $response->assertSee($record->reference);
        $response->assertSee('<input type="text" name="reference" value="'.$record->reference.'" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="reminder"></div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for reminder entry creation
     *
     * @return void
     */
    public function testReminderCreation()
    {
        $response = $this->post(route('admin.manage.reminder.store'), self::TEST_RECORD_ARRAY);
        $response->assertRedirect(route('admin.manage.reminder.index'));

        $record = Reminder::where('reference', 'Test Reference')->firstOrFail();
        $this->assertEquals($record->reminder, 'Test Reminder');
    }

    /**
     * A test for the reminder entry deletion
     *
     * @return void
     */
    public function testReminderDeletion()
    {
        $record = Reminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->delete(route('admin.manage.reminder.destroy', $record));

        $response->assertRedirect(route('admin.manage.reminder.index'));
        $this->assertEmpty(Reminder::all());
    }

    /**
     * A test for the reminder entry edit page
     *
     * @return void
     */
    public function testReminderEditPage()
    {
        $reminder = Reminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.manage.reminder.edit', [$reminder]));

        $response->assertSee('Edit Reminder');
        $response->assertSee('<input type="text" name="reference" value="Test Reference" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="reminder">Test Reminder</div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for the reminder entry creation page
     *
     * @return void
     */
    public function testReminderUpdate()
    {
        $reminder = Reminder::create(self::TEST_RECORD_ARRAY);

        $response = $this->put(route('admin.manage.reminder.update', [$reminder->id]), [
            'reference' => 'Test Reference change',
            'reminder' => 'Test Reminder change',
        ], ['HTTP_REFERER' => route('admin.manage.reminder.index')]);

        $response->assertRedirect(route('admin.manage.reminder.index'));


        $reminder = Reminder::findOrFail($reminder->id);

        $this->assertEquals($reminder->reference, 'Test Reference change');
        $this->assertEquals($reminder->reminder, 'Test Reminder change');
    }

    /**
     * A test for the reminder index page
     *
     * @return void
     */
    public function testReminderIndexPage()
    {
        $response = $this->get(route('admin.manage.reminder.index'));
        $response->assertSuccessful();
        $response->assertSee('No Reminders');

        $reminder = Reminder::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.manage.reminder.index'));
        $response->assertSuccessful();
        $response->assertSee($reminder->reference);
        $response->assertSee($reminder->reminder);
    }
}
