<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Services\System;
use App\ContactMessage;

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
        $memUsage = $system->getMemUsage();

        $vals = compact('messages', 'os', 'diskUsage', 'memUsage');
        return response()->view('admin.index', $vals);
    }
}
