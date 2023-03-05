<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use Tests\TestCase as BaseTestCase;

class QuotesTest extends BaseTestCase
{
    const TARGET_CLASS = \App\Models\Quote::class;
    const MODEL_SLUG = 'system-spec';
}