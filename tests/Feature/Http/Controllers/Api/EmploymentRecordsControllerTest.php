<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\EmploymentRecord;
use Tests\Feature\TestCase;

class EmploymentRecordsControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic index test.
     */
    public function test_index(): void
    {
        $response = $this->get(route('api.employment-records.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic store test.
     */
    public function test_store(): void
    {
        $employmentRecord = EmploymentRecord::factory()->make();

        $response = $this->post(route('api.employment-records.store'), $employmentRecord->toArray());

        $response->assertStatus(200);

        $response->assertJson($employmentRecord->toArray());
    }

    /**
     * A basic show test.
     */
    public function test_show(): void
    {
        $employmentRecord = EmploymentRecord::factory()->create();

        $response = $this->get(route('api.employment-records.show', $employmentRecord));

        $response->assertStatus(200);

        $response->assertJson($employmentRecord->toArray());
    }

    /**
     * A basic update test.
     */
    public function test_update(): void
    {
        $employmentRecord = EmploymentRecord::factory()->create();
        $employmentRecordUpdate = EmploymentRecord::factory()->make();

        $response = $this->put(route('api.employment-records.update', $employmentRecord), $employmentRecordUpdate->toArray());

        $response->assertStatus(200);
        $response->assertJson($employmentRecordUpdate->toArray());
        $response->assertJson(['id' => $employmentRecord->id]);
    }

    /**
     * A basic destroy test.
     */
    public function test_destroy(): void
    {
        $employmentRecord = EmploymentRecord::factory()->create();

        $response = $this->get(route('api.employment-records.destroy', $employmentRecord));

        $response->assertStatus(200);
    }
}
