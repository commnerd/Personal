<?php

namespace Tests\Browser\Pages\Admin\Contact;

use Tests\Browser\Pages\Page;
use Laravel\Dusk\Browser;

class Index extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return "/admin/manage/contact";
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
}
