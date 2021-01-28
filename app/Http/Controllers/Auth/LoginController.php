<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
        request()->session()->flash('intended', url()->previous());
        if(config('app.env') === 'production') {
            return Socialite::driver('google')->stateless()->redirect();
        }
        return redirect()->route('login.callback');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(): RedirectResponse
    {
        $user = config('app.env') === 'production' ?
            User::where('email', Socialite::driver('google')->stateless()->user()->email)->first() :
            User::findOrFail(1);

        if (!empty($user) && Auth::loginUsingId($user->id, true)) {
            return redirect(request()->session()->pull('intended'));
        }

        return redirect()->route('home');
    }
}
