<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Home as HomePage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class HomePageTest extends DuskTestCase
{
    /**
     * A basic home page load test
     *
     * @return void
     */
    public function testHomePageDisplay()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage);
        });
    }

    /**
     * Test contact submission
     *
     * @return void
     */
    public function testContactSubmission()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                    ->type('name', 'Test Person')
                    ->type('email_phone', '555-555-5555')
                    ->script('$(".quill-editor .ql-editor").html("Test Message");');
            $browser->click('@submit');
        });

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::findOrFail(1));
            $browser->visit(route('admin.index'))
                    ->assertSee('Test Person')
                    ->assertSee('555-555-5555');
        });
    }
}
