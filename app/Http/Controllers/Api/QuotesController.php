<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Quote::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Quote::getValidationRules());

        Quote::create($request->toArray());

        return response()->json(Quote::paginate(self::PAGE_SIZE));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return response()->json($quote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        $request->validate(Quote::getValidationRules());

        $quote->update($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
    }
}
