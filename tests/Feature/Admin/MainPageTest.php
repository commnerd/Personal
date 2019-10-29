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

        $response = $this->get(route('voyager.dashboard'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Basic page load test
     *
     * @return void
     */
    public function testAuthorizedAccess()
    {
        $response = $this->get(route('voyager.dashboard'));

        $response->assertSuccessful();
    }

    public function testSystemMonitorOSSection()
    {
        $system = new System();
        $response = $this->get(route('voyager.dashboard'));
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

        $response = $this->get(route('voyager.dashboard'));
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
        $response = $this->get(route('voyager.dashboard'));
        $response->assertSuccessful();

        $response->assertSee('Messages');
        $response->assertSee(route('admin.contact.index'));
        $response->assertSee('voyager-mail');
    }

    /**
     * Basic test for resume links
     *
     * @return void
     */
    public function testResumeLinks()
    {
        $response = $this->get(route('voyager.dashboard'));
        $response->assertSuccessful();

        $response->assertSee('Employment Record');
        $response->assertSee(route('admin.resume.index'));
        $response->assertSee('voyager-certificate');
    }

    /**
     * Basic test for daily reminder links
     *
     * @return void
     */
    public function testDailyReminderLinks()
    {
        $response = $this->get(route('voyager.dashboard'));
        $response->assertSuccessful();

        $response->assertSee('Daily Reminders');
        $response->assertSee(route('admin.daily_reminder.index'));
        $response->assertSee('voyager-receipt');
    }

    /**
     * Basic test for quote links
     *
     * @return void
     */
    public function testQuoteLinks()
    {
        $response = $this->get(route('voyager.dashboard'));
        $response->assertSuccessful();

        $response->assertSee('Quote');
        $response->assertSee(route('admin.quotes.index'));
        $response->assertSee('voyager-bubble');
    }

    /**
     * Basic test for drink links
     *
     * @return void
     */
    public function testDrinkLinks()
    {
        $response = $this->get(route('voyager.dashboard'));
        // dd($response);
        $response->assertSuccessful();

        $response->assertSee('Drinks');
        $response->assertSee(route('admin.drinks.index'));
        $response->assertSee('voyager-rum');
    }
}
