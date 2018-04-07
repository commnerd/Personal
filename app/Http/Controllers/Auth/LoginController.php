<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(): RedirectResponse
    {
        $user = User::where('email', Socialite::driver('google')->user()->email)->first();

        if (!empty($user) && Auth::loginUsingId($user->id)) {
            if(!empty(request()->session()->get('intended'))) {
                $uri = request()->session()->get('intended');
                request()->session()->put('intended', null);
                return redirect($uri);
            }
        }

        return redirect()->route('home');
    }
}
