<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Closure;

class Recaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $client = new Client();

        // Confirm recaptcha
        $response = json_decode($client->post(env('GOOGLE_RECAPTCHA_TARGET'), [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $request->get('g-recaptcha-response'),
            ]
        ])->getBody()->getContents());

        if($response->success) {
            return $next($request);
        }

        // Recaptcha check unsuccessful
        $request->session()->flash('danger', 'Your ReCaptcha was unsuccessful.');
        return redirect()->back();
    }
}
