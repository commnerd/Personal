<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\{DatabaseMigrations,RefreshDatabase};
use Laravel\Passport\Passport;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations, RefreshDatabase;

    protected function login(): void
    {
        Passport::actingAs(User::where('email', 'commnerd@gmail.com')->first());
    }
}
