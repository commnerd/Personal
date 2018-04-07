<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
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
        $this->mockGuzzleResponse(['email' => 'test@test.com'], 401);

        $response = $this->post(route('api.login'), ['token' => 'abcdefg']);

        $response->assertStatus(401);

        $response->assertJson([
            'error' => 'Invalid token.  Something went wrong.'
        ]);
    }

    /**
     * Test an valid Google idToken
     *
     * @return void
     */
    public function testValidTokenLogin()
    {
        $this->mockGuzzleResponse(['email' => 'commnerd@gmail.com'], 200);

        $response = $this->post(route('api.login'), ['token' => 'abcdefg']);

        $response->assertSuccessful();

        $response->assertStatus(200);
    }

    public function testLogout()
    {
        $user = User::firstOrFail();

        $token = JWTAuth::fromUser($user);

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
}
