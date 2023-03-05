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
        $routeName = str_replace('_', '-', static::TARGET_CLASS::slug(true));
        
        return "api.v2.composer.$routeName";
    }
}
