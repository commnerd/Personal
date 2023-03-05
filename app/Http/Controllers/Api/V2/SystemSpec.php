<?php

namespace App\Http\Controllers\Api\V2;

use App\Facades\SystemStats;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SystemSpec extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'os' => SystemStats::getOS(),
            'disk_usage' => SystemStats::getDiskUsage(),
            'uptime' => SystemStats::getUptime(),
        ]);
    }
}
