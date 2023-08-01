<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\{Response,Request};
use Socialite;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        return response()->view('welcome', [ 'quote' => Quote::inRandomOrder()->first() ]);
    }
}
