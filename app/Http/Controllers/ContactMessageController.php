<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\ContactMessage;

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

        ContactMessage::create($request->all());

        $request->session()->flash('success', 'Successfully sent message.');

        return redirect(route('home'));
    }
}
