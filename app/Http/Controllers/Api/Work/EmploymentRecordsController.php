<?php

namespace App\Http\Controllers\Api\Work;

use App\Http\Controllers\Api\Controller;
use App\Models\Work\EmploymentRecord;
use Illuminate\Http\{JsonResponse, Request};

class EmploymentRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(EmploymentRecord::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(EmploymentRecord::getValidationRules());

        return response()->json(EmploymentRecord::create($request->toArray()));
    }

    /**
     * Display the specified resource.
     */
    public function show(EmploymentRecord $employmentRecord): JsonResponse
    {
        return response()->json($employmentRecord);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmploymentRecord $employmentRecord): JsonResponse
    {
        $request->validate(EmploymentRecord::getValidationRules());

        $employmentRecord->update($request->toArray());

        return response()->json($employmentRecord);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmploymentRecord $employmentRecord)
    {
        $employmentRecord->delete();
    }
}
