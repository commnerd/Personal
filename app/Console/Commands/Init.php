<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the website for a given environment.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Copy example .env to active .env
        if(!file_exists(base_path('.env'))) {
            $this->info('Copying .env.local to .env');
            copy(base_path('.env.local'), base_path('.env'));
        }

        if(!file_exists(database_path('database.sqlite'))) {
            $this->info('Creating '.database_path('database.sqlite'));
            exec('touch '.database_path('database.sqlite'));
        }

        if(!env('APP_KEY')) {
            $this->info('Generating random application key.');
            Artisan::call('key:generate');
        }

        return Command::SUCCESS;
    }
}
