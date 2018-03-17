<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Auth;

class MainPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup for admin page
     */
    public function setUp()
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * Basic unauthorized page load test.
     *
     * @return void
     */
    public function testUnauthorizedAccess()
    {
        Auth::logout();

        $response = $this->get(route('admin.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Basic page load test
     *
     * @return void
     */
    public function testAuthorizedAccess()
    {
        $response = $this->get(route('admin.index'));

        $response->assertSuccessful();
    }

    /**
     * Basic test for messaging
     *
     * @return void
     */
    public function testMessageSection()
    {
        $response = $this->get(route('admin.index'));
        $response->assertSuccessful();

        $response->assertSee('<legend>Messages</legend>');
        $response->assertSee('<a href="'.route('contact.index').'" class="list-group-item">View All Messages</a>');
    }

    /**
     * Basic test for resume links
     *
     * @return void
     */
    public function testResumeLinks()
    {
        $response = $this->get(route('admin.index'));
        $response->assertSuccessful();

        $response->assertSee('<legend>Resume</legend>');
        $response->assertSee('<a href="'.route('resume.index').'" class="list-group-item">Edit Resume</a>');
        $response->assertSee('<a href="'.route('resume.create').'" class="list-group-item">Add Employment Record</a>');
    }

    /**
     * Basic test for daily reminder link
     *
     * @return void
     */
    public function testDailyReminderLinks()
    {
        $response = $this->get(route('admin.index'));
        $response->assertSuccessful();

        $response->assertSee('<legend>Daily Reminders</legend>');
        $response->assertSee('<a href="'.route('daily_reminder.index').'" class="list-group-item">Manage Daily Reminders</a>');
        $response->assertSee('<a href="'.route('daily_reminder.create').'" class="list-group-item">Add Daily Reminder</a>');
    }
}
