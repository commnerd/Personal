<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use Validator;
use JWTAuth;

/**
 * AuthenticationController for API
 */
class AuthenticationController extends Controller
{
    const ID_TOKEN_URI = "https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=ya29.Gl2VBebBTFEiX39q_08lir3mjVC05x3K8igbmRrFIoLett1xH47bTH6WP8fw3VzHBCqIi67UnWne2_8ol6Xe7QzfcOS8ncW0B7xVRMCCz5Y_yFBMKbY9lgB6GPQwVcE";

    /**
     * Set local variables
     *
     * @param Client $client Guzzle client to consume idToken from Google
     */
    public function __construct(Client $client) {
        $this->client = $client;
    }

    /**
     * Retrieve JWT Token
     * @param  Request $request Request with args
     * @return Response         JWT Token
     */
    public function login(Request $request): JsonResponse
    {
        $user = null;

        $credentials = $request->only('token');

        $rules = [
            'token' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['error'=> $validator->messages()], 400);
        }

        $credentials['is_verified'] = 1;

        try {
            $response = $this->client->get(self::ID_TOKEN_URI);

            $userObject = $response->getBody();

            dd($userObject);

            $email = $userObject->email;

            $user = User::where('email', $email)->firstOrFail();

            return response()->json([ 'token' => JWTAuth::fromUser($user) ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Invalid login attempt.  Something went wrong.'], 401);
        } catch (RequestException $e) {
            return response()->json(['error' => 'Invalid token.  Something went wrong.'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Problem creating JWToken.  Try again?'], 500);
        }
        return response()->json(['error' => 'Problem creating JWToken.  Try again?'], 500);
    }

    /**
     * Retrieve JWT Token
     *
     * @return JsonResponse Success message or error message
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $token = substr($request->header('Authorization'), 7);
            JWTAuth::invalidate($token);
            return response()->json(['message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'Failed to logout, please try again.'], 500);
        }
    }
}
