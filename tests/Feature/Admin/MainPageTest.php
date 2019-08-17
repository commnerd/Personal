<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Converters\Calculator;
use App\Services\System;
use Tests\TestCase;
use Auth;

class MainPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup for admin page
     */
    protected function setUp(): void
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

    public function testSystemMonitorOSSection()
    {
        $system = new System();
        $response = $this->get(route('admin.index'));
        $response->assertSuccessful();
        $response->assertSee('OS:');
        $response->assertSee($system->getOS());
    }

    public function testSystemMonitorDiskUsageSection()
    {
        $freeSpace = disk_free_space('/');
        $totalSpace = disk_total_space('/');
        $usedSpace = $totalSpace - $freeSpace;

        $diskUsagePercent = number_format(100 * ($usedSpace / $totalSpace))."%";
        $usedSpace = Calculator::metric($usedSpace, 1)."B";
        $totalSpace = Calculator::metric($totalSpace, 1)."B";
        $diskUsage = $usedSpace." / ".$totalSpace;

        $response = $this->get(route('admin.index'));
        $response->assertSee('Disk Usage:');
        $response->assertSee($usedSpace);
        $response->assertSee($totalSpace);
        $response->assertSee($diskUsagePercent);
        $response->assertSee($diskUsage);
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
        $response->assertSee('<a href="'.route('admin.contact.index').'" class="list-group-item">View All Messages</a>');
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
        $response->assertSee('<a href="'.route('admin.resume.index').'" class="list-group-item">Edit Resume</a>');
        $response->assertSee('<a href="'.route('admin.resume.create').'" class="list-group-item">Add Employment Record</a>');
    }

    /**
     * Basic test for daily reminder links
     *
     * @return void
     */
    public function testDailyReminderLinks()
    {
        $response = $this->get(route('admin.index'));
        $response->assertSuccessful();

        $response->assertSee('<legend>Daily Reminders</legend>');
        $response->assertSee('<a href="'.route('admin.daily_reminder.index').'" class="list-group-item">Manage Daily Reminders</a>');
        $response->assertSee('<a href="'.route('admin.daily_reminder.create').'" class="list-group-item">Add Daily Reminder</a>');
    }

    /**
     * Basic test for quote links
     *
     * @return void
     */
    public function testQuoteLinks()
    {
        $response = $this->get(route('admin.index'));
        $response->assertSuccessful();

        $response->assertSee('<legend>Quotes</legend>');
        $response->assertSee('<a href="'.route('admin.quotes.index').'" class="list-group-item">Manage Quotes</a>');
        $response->assertSee('<a href="'.route('admin.quotes.create').'" class="list-group-item">Add Quote</a>');
    }
}
