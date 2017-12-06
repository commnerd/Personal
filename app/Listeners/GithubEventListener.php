<?php

namespace App\Listeners;

use App\Events\GithubEvent;
use App\Jobs\Deploy;

class GithubEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GithubEvent  $event
     * @return void
     */
    public function handle(GithubEvent $event)
    {
        Deploy::dispatch($event);
    }
}
