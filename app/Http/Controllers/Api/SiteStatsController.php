<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\{JsonResponse, Request};
use App\Services\System;


class SiteStatsController extends Controller
{
    /**
     * Display resource statistics.
     */
    public function index(System $system): JsonResponse
    {
        return response()->json([
            'composer' => [
                'repos' => [
                    'count' => \App\Models\Composer\Package::count(),
                ],
                'sources' => [
                    'count' => \App\Models\Composer\PackageSource::count(),
                ],
            ],
            'contact_messages' => [
                'count' => \App\Models\ContactMessage::count(),
            ],
            'drinks' => [
                'count' => \App\Models\Drink::count(),
            ],
            'employment_records' => [
                'count' => \App\Models\Work\EmploymentRecord::count(),
            ],
            'food' => [
                'restaurants' => [
                    'count' => \App\Models\Food\Restaurant::count(),
                ],
                'orders' => [
                    'count' => \App\Models\Food\Order::count(),
                ]
            ],
            'portfolio_entries' => [
                'count' => \App\Models\Work\PortfolioEntry::count(),
            ],
            'system' => [
                'os' => $system->getOs(),
                'uptime' => $system->getUptime(),
                'disk_usage' => $system->getDiskUsage(),
            ],
        ]);
    }
}
