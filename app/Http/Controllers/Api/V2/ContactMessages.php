<?php

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\ContactMessage;

class ContactMessages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(ContactMessage::paginate(self::PAGE_COUNT));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(ContactMessage::factory()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactMessage  $contact_message
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ContactMessage $contact_message): JsonResponse
    {
        return response()->json($contact_message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactMessage  $contact_message
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ContactMessage $contact_message): JsonResponse
    {
        $contact_message->update($request->toArray());
        return response()->json($contact_message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactMessage  $contact_message
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();
        return response()->json($contact_message);
    }
}
