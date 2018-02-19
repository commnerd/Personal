<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\ContactMessage;
use GuzzleHttp\Client;

class ContactMessageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return response()->view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): Response
    {
        $message = ContactMessage::findOrFail($id);

        return response()->view('admin.messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        ContactMessage::destroy($id);

        return redirect()->back();
    }
}
