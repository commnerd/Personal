<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Socialite;
use App\User;
use Mockery;
use JWTAuth;

class AuthenticationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Default invalid test record values
     *
     * @var array
     */
    const TEST_INVALID_USER_ARRAY = [
        'name' => 'Test User',
        'email' => 'test@test.com',
    ];

    /**
     * Default valid test record values
     *
     * @var array
     */
    const TEST_VALID_USER_ARRAY = [
        'name' => 'Michael J. Miller',
        'email' => 'commnerd@gmail.com',
    ];

    /**
     * Test logging in with token
     *
     * @return void
     */
    public function testNoTokenLogin()
    {
        $response = $this->post(route('api.login'));

        $response->assertStatus(400);

        $response->assertJson([
            "error" => [
                "token" => [
                    "The token field is required."
                ]
            ]
        ]);
    }

    /**
     * Test an invalid Google idToken
     *
     * @return void
     */
    public function testInvalidTokenLogin()
    {
        $this->mockSocialiteCall('');

        $response = $this->post(route('api.login'), ['token' => 'abcdefg']);

        $response->assertStatus(401);

        $response->assertJson([
            'error' => 'Invalid login attempt.  Something went wrong.'
        ]);
    }

    /**
     * Test an valid Google idToken
     *
     * @return void
     */
    public function testValidTokenLogin()
    {
        $this->mockSocialiteCall('commnerd@gmail.com');

        $response = $this->post(route('api.login'), ['token' => 'abcdefg']);

        $response->assertSuccessful();

        $response->assertStatus(200);
    }

    public function testLogout()
    {
        $user = User::firstOrFail();

        $token = JWTAuth::fromUser($user);
        // dd($token);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->get(route('api.logout'), ["token" => $token]);

        $response->assertSuccessful();

        $response->assertJson(['message'=> "You have successfully logged out."]);

        $response = $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->get(route('api.logout'), ["token" => $token]);

        $response->assertStatus(401);
    }

    /**
     * Setup socialite faker
     *
     * @param  string $email Email to have mockery return
     * @return void
     */
    private function mockSocialiteCall(string $email)
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->email = $email;

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('userFromToken')
            ->withAnyArgs()
            ->andReturn($abstractUser);

        $socialite = Socialite::shouldReceive('driver')
            ->with('google')
            ->andReturn($provider);
    }
}
