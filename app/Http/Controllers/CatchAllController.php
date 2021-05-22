<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CatchAllController extends Controller
{
    /**
     * Handle all routes
     *
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        return response()->view("index");
    }
}
