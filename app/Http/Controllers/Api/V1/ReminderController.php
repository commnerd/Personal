<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Reminder;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Reminder::paginate(self::PAGE_COUNT));
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Reminder $reminder): JsonResponse
    {
        return response()->json($reminder);
    }
}
