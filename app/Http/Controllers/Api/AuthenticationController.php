<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Socialite;
use Validator;
use App\User;
use JWTAuth;

/**
 * AuthenticationController for API
 */
class AuthenticationController extends Controller
{
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
            $email = Socialite::driver('google')->userFromToken($request->token)->email;

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
