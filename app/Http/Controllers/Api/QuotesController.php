<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request): JsonResponse
    {
        $request->validate(Quote::getValidationRules());

        $quote = null;
        DB::transaction(function() use (&$quote, $request) {
            if($request->active) {
                Quote::where('active', true)->update(['active' => false]);
            }
            $quote = Quote::create($request->toArray());
        });

        return response()->json($quote);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote): JsonResponse
    {
        return response()->json($quote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote): JsonResponse
    {
        $request->validate(Quote::getValidationRules());

        DB::transaction(function() use (&$quote, $request) {
            if($request->active) {
                Quote::where('active', true)->update(['active' => false]);
            }
            $quote->update($request->toArray());
        });

        return response()->json($quote);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
    }
}
