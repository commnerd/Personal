<?php

namespace App\Http\Controllers\Admin;

use App\Services\Converters\Calculator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    /**
     * Display the main admin page.
     *
     * @return \Illuminate\View\View
     */
    public function index(): Response
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->limit(5)->get();

        $usedSpace = Calculator::metric(disk_total_space('/') - disk_free_space('/'), 2)."B";
        $totalSpace = Calculator::metric(disk_total_space('/'), 2)."B";
        $diskUsage = $usedSpace." / ".$totalSpace;

        return response()->view('admin.index', compact('messages', 'diskUsage'));
    }
}
