<?php

namespace App\Console\Commands;

use App\Models\Work\EmploymentRecord;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        DB::transaction(function() {
            EmploymentRecord::truncate();

            $data = $this->fetchData();

            if(!empty($data->experiences)) {
                foreach($data->experiences as $experience) {
                    EmploymentRecord::create([
                        'employer' => $experience->company,
                        'position' => $experience->title,
                        'location' => $experience->location,
                        'start_date' => $experience->start_month . "/" . $experience->start_year,
                        'end_date' => $experience->end_month . "/" . $experience->end_year,
                        'bullets' => $experience->description,
                    ]);
                }
            }
        });
    }

    private function fetchData(): \stdClass {
        $data = json_decode(file_get_contents('https://michaeljmiller.net/storage/rapid_api_linkedin_profile_output.txt'));

        return $data->data;
    }
}
