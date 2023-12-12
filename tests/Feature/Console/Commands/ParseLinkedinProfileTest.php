<?php

namespace Tests\Feature\Console\Commands;

use App\Models\Work\EmploymentRecord;
use Tests\Feature\TestCase;
use Illuminate\Support\Facades\Artisan;


class ParseLinkedinProfileTest extends TestCase
{
    /**
     * Test retreival and parsing of linkedin profile.
     */
    public function test_retrieval_of_records(): void
    {
        Artisan::call('app:parse-linkedin-profile');

        $this->assertEquals(EmploymentRecord::count(), 9);
    }
}
