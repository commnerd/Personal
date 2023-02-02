<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Config;

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
        if(!file_exists(base_path('.env'))) {
            $this->info('Copying .env.local to .env');
            copy(base_path('.env.local'), base_path('.env'));

            $this->info('Generating key.');
            Artisan::call('key:generate');

            // Load .env contents
            if ($file = fopen(base_path('.env'), 'r')) {
                while(!feof($file)) {
                    $line = trim(fgets($file));
                    if(!empty($line)) {
                        putenv($line);
                    }
                }
                fclose($file);
            }

            Config::set('database', require(config_path('database.php')));
        }

        if(empty(env('APP_KEY'))) {
            $this->info('Generating key.');
            Artisan::call('key:generate');
        }

        if(!file_exists(public_path('storage'))) {
            $this->info('Link storage directory.');
            Artisan::call('storage:link');
        }

        if(!file_exists(database_path('database.sqlite'))) {
            $this->info('Creating '.database_path('database.sqlite'));
            file_put_contents(database_path('database.sqlite'), '');
        }

        $this->info('Running migrations.');
        Artisan::call('migrate --force');

        if(!file_exists(storage_path('oauth-private.key'))) {
            $this->info('Installing Passport keys.');
            Artisan::call('passport:keys');
        }

        return Command::SUCCESS;
    }
}