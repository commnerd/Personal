<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\System;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(System $system): JsonResponse
    {
        return response()->json([
            'os' => $system->getOs(),
            'uptime' => $system->getUptime(),
            'disk_usage' => $system->getDiskUsage(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
