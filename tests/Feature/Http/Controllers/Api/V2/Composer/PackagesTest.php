<?php

namespace Tests\Feature\Http\Controllers\Api\V2\Composer;

use App\Models\Composer\Package;

class PackagesTest extends TestCase
{
    const TARGET_CLASS = Package::class;
    const MODEL_SLUG = 'packages';
}
