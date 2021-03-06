<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Home extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());

        $browser->assertSee('WELCOME!');
        $browser->assertSee('Family');
        $browser->assertSee('Quote');
        $browser->assertSee('Social');
        $browser->assertSee('Contact');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@name' => 'input[name="name"]',
            '@contact' => 'input[name="email_phone"]',
            '@submit' => 'button.btn-primary',
        ];
    }
}
