<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{JsonResponse,RedirectResponse,Request};
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(): RedirectResponse
    {
        if(config('app.env') !== 'production') {
            $token = User::where('id', 1)->first()->createToken('Admin Token')->accessToken;

            return redirect("/admin/set-jwt?jwt=$token");
        }
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        $data = Socialite::driver('google')->stateless()->user();

        $token = User::where('email', $data->email)->first()->createToken('Admin Token')->accessToken;

        return redirect("/admin/set-jwt?jwt=$token");
    }
}
