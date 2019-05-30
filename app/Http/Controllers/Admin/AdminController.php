<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Response;
use App\Services\System;

class AdminController extends Controller
{
    /**
     * Display the main admin page.
     *
     * @return \Illuminate\View\View
     */
    public function main(System $system): Response
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->limit(5)->get();
        $os = $system->getOS();
        $diskUsage = $system->getDiskUsage();

        $vals = compact('messages', 'os', 'diskUsage');
        return response()->view('admin.index', $vals);
    }
}
