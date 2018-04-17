<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Work\EmploymentRecord;
use Tests\TestCase;

class ResumeTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Default test record values
     *
     * @var array
     */
    const TEST_RECORD_ARRAY = [
        'employer' => 'Test Employer',
        'position' => 'Test Position',
        'location' => 'Test Location, ST',
        'start_date' => 'Jun 2017',
        'bullets' => 'Test content for job',
    ];

    public function testDateDisplay()
    {
        EmploymentRecord::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('resume'));

        $response->assertSee('Jun 2017 - Present');
    }
}
