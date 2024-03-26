<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreDailyReminderRequest;
use App\Http\Requests\UpdateDailyReminderRequest;
use App\Models\DailyReminder;

class DailyReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(DailyReminder::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDailyReminderRequest $request): JsonResponse
    {
        return response()->json(DailyReminder::create($request->toArray()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyReminder $dailyReminder): JsonResponse
    {
        return response()->json($dailyReminder);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDailyReminderRequest $request, DailyReminder $dailyReminder): JsonResponse
    {
        $dailyReminder->update($request->toArray());

        return response()->json($dailyReminder);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyReminder $dailyReminder)
    {
        $dailyReminder->delete();
    }
}
