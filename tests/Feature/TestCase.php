<?php

namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;
}
