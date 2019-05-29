<?php

namespace App\Jobs;

use App\Events\GithubEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Deploy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GithubEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $target = $this->event->getReleaseTarballUrl();

      $ch = curl_init();

      $url = "https://michaeljmiller.net/jenkins/job/Personal%20Website%20Triggered/buildWithParameters";
      $url .= "?token=".env("JENKINS_AUTH_TOKEN")."&srcPath=".urlencode($target);

      curl_setopt($ch, CURLOPT_URL, $url);

      curl_exec($ch);

      curl_close($ch);
    }
}
