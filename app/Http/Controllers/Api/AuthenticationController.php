<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Socialite;

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
    public function login(Request $request): Response
    {
        $user = null;

        $credentials = $request->only('token');

        $rules = [
            'token' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $credentials['is_verified'] = 1;

        try {
            $email = Socialite::driver('google')->userFromToken($request->token)->email;
            $user = User::where('email', $email)->first();
            if (empty($user)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true, 'data'=> [ 'token' => JWTAuth::fromUser($user) ]]);
    }

    /**
     * Retrieve JWT Token
     * @param  Request $request Request with args
     * @return [type]           [description]
     */
    public function logout(): Response
    {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }
}
