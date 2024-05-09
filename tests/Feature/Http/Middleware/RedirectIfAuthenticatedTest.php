<?php

namespace Tests\Feature\Http\Middleware;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\{Request, Response};
use Tests\TestCase;

class RedirectIfAuthenticatedTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_null_guard(): void
    {
        $request = Request::create(route('web.home'));
        $next = function(): Response {
            return response('this worked');
        };
        $middleware = new RedirectIfAuthenticated();
        $response = $middleware->handle($request, $next);

        $this->assertEquals($response, $middleware->handle($request, $next));
    }

    /**
     * A basic feature test example.
     */
    public function test_checked_guard(): void
    {
        $request = Request::create(route('web.home'));
        $next = function(): Response {
            return response('this worked');
        };
        $middleware = new RedirectIfAuthenticated();
        $response = redirect(route('web.home'));

        Auth::shouldReceive('guard')->andReturn(new TrueChecker());

        $this->assertEquals($response, $middleware->handle($request, $next, 'api'));
    }
}

class TrueChecker {
    function check(): bool
    {
        return true;
    }
}
