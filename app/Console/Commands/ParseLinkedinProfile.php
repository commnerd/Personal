<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ParseLinkedinProfile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-linkedin-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate employment records data with LinkedIn profile scrape';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = $this->fetchData();

        if(!empty($data->experiences)) {
            foreach((array)($data->experiences) as $experience) {
                echo $experience->company . ", " . $experience->date_range . "\n";
                dd($experience);
            }
        }
    }

    private function fetchData(): \stdClass {
        $data = json_decode(file_get_contents('https://michaeljmiller.net/storage/rapid_api_linkedin_profile_output.txt'));

        return $data->data;
    }
}
