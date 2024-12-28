<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

use App\Models\Work\{EmploymentRecord,PortfolioEntry};

class LinkedinPull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'linkedin:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull and parse LinkedIn profile to companies, positions, and accomplishments hierarchical structure.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PortfolioEntry::truncate();
        EmploymentRecord::truncate();
        
        $response = Http::withHeader('x-rapidapi-host', 'fresh-linkedin-profile-data.p.rapidapi.com')
            ->withHeader('x-rapidapi-key', config('rapid_api.rapid_api_key'))
            ->get('https://fresh-linkedin-profile-data.p.rapidapi.com/get-linkedin-profile?linkedin_url=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fmichaeljmiller79%2F&include_skills=false&include_certifications=false&include_publications=false&include_honors=false&include_volunteers=false&include_projects=false&include_patents=false&include_courses=false&include_organizations=false&include_profile_status=false&include_company_public_url=false');

        $linkedinData = json_decode($response->body())->data;

        $messages = [];

        foreach($linkedinData->experiences as $experience) {
            EmploymentRecord::create([
                'linkedin_company_id' => $experience->company_id,
                'employer' => $experience->company,
                'position' => $experience->title,
                'bullets' => fake()->text(),
                'location' => fake()->text(),
                'start_date' => fake()->date(),
                'end_date' => fake()->date(),
            ]);
            array_push($messages, [
                'role' => 'user',
                'content' => "Translate the following content into bullet points with '*' as the bullet icon:\n$experience->description",
            ]);

            dd($experience);
        }

        foreach($messages as $message) {
            $response = Http::withHeader('Content-Type', 'application/json')
            ->withHeader('x-rapidapi-host', 'chatgpt-42.p.rapidapi.com')
            ->withHeader('x-rapidapi-key', config('rapid_api.rapid_api_key'))
            ->post('https://chatgpt-42.p.rapidapi.com/gpt4', [
                'messages' => [$message],
                'web_access' => false,
            ]);
            
            json_decode($response->body())->result;
        }
        
    }
}
