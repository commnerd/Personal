<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\DailyReminder;

class DailyReminderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $dailyReminders = DailyReminder::paginate(self::PAGE_COUNT);

        return response()->view('admin.daily_reminder.index', compact('dailyReminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('admin.daily_reminder.create', ['title' => 'Create Daily Reminder']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        DailyReminder::create($request->all());

        return redirect()->route('admin.daily_reminder.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyReminder  $dailyReminder
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyReminder $dailyReminder): Response
    {
        return response()->view('admin.daily_reminder.edit', compact('dailyReminder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyReminder  $dailyReminder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, DailyReminder $dailyReminder): RedirectResponse
    {
        $dailyReminder->update($request->all());

        return redirect()->route('admin.daily_reminder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyReminder  $dailyReminder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DailyReminder $dailyReminder): RedirectResponse
    {
        $dailyReminder->delete();

        return redirect(route('admin.daily_reminder.index'));
    }
}
