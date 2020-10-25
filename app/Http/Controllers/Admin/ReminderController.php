<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $reminders = Reminder::paginate(self::PAGE_COUNT);

        return response()->view('admin.reminder.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        $title = 'Create Reminder';

        $latest = Reminder::latest()->first();

        return response()->view('admin.reminder.create', compact('title', 'latest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Reminder::create($request->all());

        return redirect()->route('admin.manage.reminder.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder): Response
    {
        $latest = null;

        return response()->view('admin.reminder.edit', compact('reminder', 'latest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Reminder $reminder): RedirectResponse
    {
        $reminder->update($request->all());

        return redirect()->route('admin.manage.reminder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reminder $reminder): RedirectResponse
    {
        $reminder->delete();

        return redirect()->route('admin.manage.reminder.index');
    }
}
