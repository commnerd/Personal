<?php

namespace App\Http\Middleware;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Closure;

class StripHtml
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

        $response = $next($request);

        return $this->stripHtml($response);
    }

    private function stripHtml(JsonResponse $response): JSonResponse {
        $serializedResponse = $this->serialize($response);

        $serializedResponse = strip_tags($serializedResponse);

        $response->setData($this->deserialize($serializedResponse));

        return $response;
    }

    private function serialize(JsonResponse $response): string {
        return json_encode($response->getData());
    }

    private function deserialize(string $response): object {
        return json_decode($response);
    }
}
