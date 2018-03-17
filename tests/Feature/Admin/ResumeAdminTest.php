<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Work\EmploymentRecord;
use Tests\TestCase;
use Auth;

class ResumeAdminTest extends TestCase
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

        Auth::loginUsingId(1);
    }

    /**
     * A test for the resume entry creation page
     *
     * @return void
     */
    public function testResumeCreationPage()
    {
        $response = $this->get(route('resume.create'));
        $response->assertSuccessful();

        $response->assertSee('Create Employment Record');
        $response->assertSee('<input type="text" name="employer" value="" class="form-control">');
        $response->assertSee('<input type="text" name="position" value="" class="form-control">');
        $response->assertSee('<input type="text" name="location" value="" class="form-control">');
        $response->assertSee('<input type="text" name="start_date" value="" class="form-control month-picker">');
        $response->assertSee('<input type="text" name="end_date" value="" class="form-control month-picker">');
        $response->assertSee('<textarea name="bullets" class="form-control"></textarea>');
        $response->assertSee('<input class="btn btn-default" type="submit" />');
    }

    /**
     * A test for resume entry creation
     *
     * @return void
     */
    public function testResumeCreation()
    {
        $response = $this->post(route('resume.store'), self::TEST_RECORD_ARRAY);
        $response->assertRedirect(route('resume.index'));

        $record = EmploymentRecord::where('employer', 'Test Employer')->firstOrFail();
        $this->assertEquals($record->employer, 'Test Employer');
        $this->assertEquals($record->position, 'Test Position');
        $this->assertEquals($record->location, 'Test Location, ST');
        $this->assertEquals($record->start_date, 'Jun 2017');
        $this->assertEquals($record->end_date, 'Dec 2017');
        $this->assertEquals($record->bullets, 'Test content for job');
    }

    /**
     * A test for the resume entry deletion
     *
     * @return void
     */
    public function testResumeDeletion()
    {
        $record = EmploymentRecord::create(self::TEST_RECORD_ARRAY);
        $response = $this->delete(route('resume.destroy', $record));

        $response->assertRedirect(route('resume.index'));
        $this->assertEmpty(EmploymentRecord::all());
    }

    /**
     * A test for the resume entry edit page
     *
     * @return void
     */
    public function testResumeEditPage()
    {
        $record = EmploymentRecord::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('resume.edit', ['record' => $record]));

        $response->assertSee('Edit Employment Record (Test Employer)');
        $response->assertSee('<input type="text" name="employer" value="Test Employer" class="form-control">');
        $response->assertSee('<input type="text" name="position" value="Test Position" class="form-control">');
        $response->assertSee('<input type="text" name="location" value="Test Location, ST" class="form-control">');
        $response->assertSee('<input type="text" name="start_date" value="Jun 2017" class="form-control month-picker">');
        $response->assertSee('<input type="text" name="end_date" value="Dec 2017" class="form-control month-picker">');
        $response->assertSee('<textarea name="bullets" class="form-control">Test content for job</textarea>');
        $response->assertSee('<input class="btn btn-default" type="submit" />');
    }

    /**
     * A test for the resume entry creation page
     *
     * @return void
     */
    public function testResumeUpdate()
    {
        $record = EmploymentRecord::create(self::TEST_RECORD_ARRAY);

        $response = $this->put(route('resume.update', ['id' => $record->id]), [
            'employer' => 'Test Employer change',
            'position' => 'Test Position change',
            'location' => 'Test Location, ST change',
            'start_date' => 'Jun 2018',
            'end_date' => 'Dec 2018',
            'bullets' => 'Test content for job change',
        ]);

        $response->assertRedirect(route('resume.index'));

        $record = EmploymentRecord::findOrFail($record->id);

        $this->assertEquals($record->employer, 'Test Employer change');
        $this->assertEquals($record->position, 'Test Position change');
        $this->assertEquals($record->location, 'Test Location, ST change');
        $this->assertEquals($record->start_date, 'Jun 2018');
        $this->assertEquals($record->end_date, 'Dec 2018');
        $this->assertEquals($record->bullets, 'Test content for job change');
    }

    /**
     * A test for the resume index page
     *
     * @return void
     */
    public function testResumeIndexPage()
    {
        $response = $this->get(route('resume.index'));
        $response->assertSuccessful();
        $response->assertSee('No Records');

        $record = EmploymentRecord::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('resume.index'));
        $response->assertSuccessful();
        $response->assertSee($record->employer);
    }

    /**
     * Test resume record sort
     */
    public function testResumeRecordSort()
    {
        EmploymentRecord::create(self::TEST_RECORD_ARRAY);
        EmploymentRecord::create([
            'employer' => 'Test Employer Number 2',
            'position' => 'Test Position Number 2',
            'location' => 'Test Location, Ave',
            'start_date' => 'Aug 2016',
            'end_date' => 'Dec 2016',
            'bullets' => 'Test content for job',
        ]);

        $records = EmploymentRecord::all()->sortBy('sortDate');

        $this->assertEquals($records->shift()->employer, 'Test Employer Number 2');

        $this->assertEquals($records->shift()->employer, 'Test Employer');
    }
}
