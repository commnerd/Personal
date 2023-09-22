<?php

namespace App\Http\Controllers\Api\Composer;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\{JsonResponse, Request};
use App\Models\Composer\Package;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Package::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $package = Package::create($request->all());
        return response()->json($package->toJson());
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package): JsonResponse
    {
        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package): JsonResponse
    {
        $package->fill($request->all());
        return response()->json($package);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
