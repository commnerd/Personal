<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Models\Drink;

class DrinksTest extends TestCase
{
    const TARGET_CLASS = \App\Models\Drink::class;
    const MODEL_SLUG = 'drinks';
}
