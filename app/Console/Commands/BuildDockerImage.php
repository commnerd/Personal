<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Console\Output\StreamOutput;

class BuildDockerImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:build-image {--tag=test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build commnerd/personal:{version} docker image';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $basePath = base_path();
        $tag = $this->option('tag');

        $stream = fopen('php://output', 'w');
        $process = new Process(["bin/docker-image.sh", $tag], $basePath, null, null, null, new StreamOutput($stream));
        $process->start();

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                echo $data;
            } else {
                echo $data;
            }
        }

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->info($process->getOutput());
    }
}
