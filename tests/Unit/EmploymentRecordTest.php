<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Work\EmploymentRecord;
use Tests\TestCase;

class EmploymentRecordTest extends TestCase
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
        'end_date' => 'Dec 2017',
        'bullets' => 'Test content for job',
    ];

    /**
     * Setup for admin access
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test date conversion
     *
     * @return void
     */
    public function testYearMonthConversion()
    {
        $record = EmploymentRecord::create(self::TEST_RECORD_ARRAY);
        $this->assertEquals($record->sortDate, "2017-06");
    }
}
