<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GithubEventAuth
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
        if (empty($request->header('x-hub-signature'))) {
            throw new \Exception("HTTP header 'X-Hub-Signature' is missing.");
        } elseif (!extension_loaded('hash')) {
            throw new \Exception("Missing 'hash' extension to check the secret code validity.");
        }

        list($algo, $hash) = explode('=', $request->header('x-hub-signature'), 2) + array('', '');

        if (!in_array($algo, hash_algos(), TRUE)) {
            throw new \Exception("Hash algorithm '$algo' is not supported.");
        }

        $rawPost = file_get_contents('php://input');
        if($hash !== hash_hmac($algo, $rawPost, env('APP_KEY'))) {
            return response()->json('Unauthorized', 403);
        }

        return $next($request);
    }
}
