<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageNotification;
use Illuminate\Http\RedirectResponse;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Session;
use Mail;

class ContactMessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(ContactMessage::getValidationRules());

        $message = ContactMessage::create($request->all());

        Mail::to(env('APP_ADMIN_EMAIL'))->send(new ContactMessageNotification($message));
        Session::flash('success', 'Successfully sent message.');

        return redirect(route('home'));
    }
}
