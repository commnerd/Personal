<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Home as HomePage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

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
}
