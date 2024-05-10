<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Tests\Feature\TestCase;
use Laravel\Socialite\Facades\Socialite;

class AuthControllerTest extends TestCase
{
    /**
     * A basic production redirect test.
     */
    public function test_production_redirect(): void
    {
        Artisan::call('passport:client --personal --name \'Personal\'');
        Config::set('app.env', 'production');
        $response = $this->get(route('api.login'));

        $response->assertStatus(302);
        $response->assertRedirect('https://accounts.google.com/o/oauth2/auth?scope=openid+profile+email&response_type=code');
    }

    /**
     * A basic redirect test.
     */
    public function test_dev_redirect(): void
    {
        Artisan::call('passport:client --personal --name \'Personal\'');
        $response = $this->get(route('api.login'));
        $response->assertStatus(302);
        $this->assertTrue(!!preg_match("#http://localhost/admin/set-jwt\?jwt=#", $response->getTargetUrl()));
    }

    /**
     * A basic callback test.
     */
    public function test_callback(): void
    {
        Artisan::call('passport:client --personal --name \'Personal\'');

        $mock = Socialite::partialMock();
        $mock->shouldReceive('driver')->andReturn($mock);
        $mock->shouldReceive('stateless')->andReturn($mock);
        $mock->shouldReceive('user')->andReturn(User::findOrFail(1));

        $response = $this->get(route('api.login.callback'));

        $response->assertStatus(302);
        $this->assertTrue(!!preg_match("#http://localhost/admin/set-jwt\?jwt=#", $response->getTargetUrl()));
    }
}
