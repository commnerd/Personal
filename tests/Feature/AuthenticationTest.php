<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Socialite;
use Mockery;
use App\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login redirect to Google.
     *
     * @return void
     */
    public function testLoginRedirect()
    {
        $response = $this->get('/login');

        $response->assertStatus(302);
    }

    /**
     * Test authentication
     *
     * @return void
     */
    public function testFailedAuthenticationRedirect()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->email = 'commnerd@gmail.com';

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/login/callback');

        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
    }
}
