<?php

namespace Tests\Feature\Http\Controllers\Api\V2\Composer;
 
use Tests\Feature\Http\Controllers\Api\V2\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    
    /**
     * Helper to dynamically build route names
     * 
     * @return Route base name
     */
    protected function getRouteBaseName(): string
    {
        return 'api.v2.composer.'.static::MODEL_SLUG;
    }
}
