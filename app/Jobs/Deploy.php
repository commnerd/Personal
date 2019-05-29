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
        $target = urlencode($this->event->getReleaseTarballUrl());

        $username = env("JENKINS_USERNAME");
        $user_token = env("JENKINS_USER_TOKEN");
        $build_token = env("JENKINS_BUILD_TOKEN");

        $url = "https://$username:$user_token@michaeljmiller.net/jenkins/job/Personal%20Website%20Triggered/buildWithParameters?token=$build_token";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "srcPath=$target");
        curl_exec($ch);

        curl_close($ch);
    }
}
