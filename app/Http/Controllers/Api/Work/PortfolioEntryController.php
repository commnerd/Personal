<?php

namespace App\Http\Controllers\Api\Work;

use App\Http\Controllers\Api\Controller;
use App\Models\Work\PortfolioEntry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(PortfolioEntry::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(PortfolioEntry::getValidationRules());

        return response()->json(PortfolioEntry::create($request->toArray()));
    }

    /**
     * Display the specified resource.
     */
    public function show(PortfolioEntry $portfolioEntry): JsonResponse
    {
        return response()->json($portfolioEntry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioEntry $portfolioEntry): JsonResponse
    {
        $request->validate(PortfolioEntry::getValidationRules());

        $portfolioEntry->update($request->toArray());

        return response()->json($portfolioEntry);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioEntry $portfolioEntry): void
    {
        $portfolioEntry->delete();
    }
}
