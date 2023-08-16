<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\{Response,Request};
use Illuminate\Support\Facades\Cache;
use Socialite;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        $quote = Cache::get('qotd') ?? Quote::inRandomOrder()->first();
        
        if(is_null(Cache::get('qotd'))) {
            Cache::put('qotd', $quote, strtotime('today midnight'));
        }

        return response()->view('welcome', [ 'quote' => $quote ]);
    }
}
