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
        if($request->header('X-Hub-Signature') !== 'base64:'.env('APP_KEY')) {
            return response()->json('Unauthorized', 403);
        }
        return $next($request);
    }
}
