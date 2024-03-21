<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactMessage;
use Illuminate\Http\{JsonResponse,Request};

class ContactMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(ContactMessage::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(ContactMessage::getValidationRules());

        return response()->json(ContactMessage::create($request->toArray()));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage): JsonResponse
    {
        return response()->json($contactMessage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $contactMessage): JsonResponse
    {
        $request->validate(ContactMessage::getValidationRules());

        $contactMessage->update($request->toArray());

        return response()->json($contactMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
    }
}
