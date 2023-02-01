<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use App\Models\User;
use Artisan;
use Mockery;

class AuthenticationControllerTest extends TestCase
{
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

    protected function setUp(): void {
        parent::setUp();
        User::factory()->create(self::TEST_VALID_USER_ARRAY);
        Artisan::call('passport:client --personal --name="Michael J. Miller API Auth Client"');
    }

    /**
     * Test logging in with token
     *
     * @return void
     */
    public function testNoTokenLogin()
    {
        $response = $this->post(route('api.v1.login'));

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

        $response = $this->post(route('api.v1.login'), ['token' => 'abcdefg']);

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

        $response = $this->post(route('api.v1.login'), ['token' => 'abcdefg']);

        $response->assertSuccessful();
    }

    public function testLogoutUser()
    {
        $user = User::firstOrFail();

        Passport::actingAs(
            User::findOrFail(1),
            [
                'search-orders',
                'manage-restaurants',
            ]
        );

        $response = $this->get(route('api.v1.logout'));

        $response->assertSuccessful();

        $response->assertJson(['message'=> "You have successfully logged out."]);
    }

    public function testLogoutGuest()
    {
        $response = $this->get(route('api.v1.logout'));

        $response->assertStatus(401);
    }
}
