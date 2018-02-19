<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\ContactMessage;

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

        return response()->view('admin.index', compact('messages'));
    }
}
