<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{JsonResponse,RedirectResponse,Request};
use Socialite;

class AuthController extends Controller
{
    public function login(): RedirectResponse
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback(Request $request): JsonResponse
    {
        
        $data = Socialite::driver('google')->stateless()->user();

        $token = User::where('email', $data->email)->first()->createToken('Admin Token')->accessToken;

        return response()->json(['jwt' => $token]);
    }
}
