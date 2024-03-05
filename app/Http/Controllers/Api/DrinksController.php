<?php

namespace App\Http\Controllers\Api;

use App\Models\Drink;
use Illuminate\Http\{JsonResponse,Request};

class DrinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Drink::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(Drink::getValidationRules());

        return response()->json(Drink::create($request->toArray()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink): JsonResponse
    {
        return response()->json($drink);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drink $drink): JsonResponse
    {
        $request->validate(Drink::getValidationRules());

        $drink->update($request->toArray());

        return response()->json($drink);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();
    }
}
