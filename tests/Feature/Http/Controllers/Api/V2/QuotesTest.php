<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Models\Quote;

class QuotesTest extends TestCase
{
    const TARGET_CLASS = \App\Models\Quote::class;
    const MODEL_SLUG = 'quotes';
}