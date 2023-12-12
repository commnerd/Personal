<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    protected function login(): void
    {
        if(!file_exists(storage_path('oauth-private.key') || !file_exists(storage_path('oauth-public.key')))) {
            Artisan::call('passport:keys');
        }
        Passport::actingAs(User::where('email', 'commnerd@gmail.com')->first());
    }
}
