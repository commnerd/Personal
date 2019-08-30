<?php

namespace Tests\Browser\Pages\Admin\Drinks;

use Tests\Browser\Pages\Page;
use Laravel\Dusk\Browser;

class Create extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return "/admin/drinks/create";
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
            '@recipe' => 'div[data-name="recipe"]',
            '@submit' => 'input[type="submit"]',
        ];
    }
}
