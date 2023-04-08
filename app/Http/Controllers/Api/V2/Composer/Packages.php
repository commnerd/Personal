<?php

namespace App\Http\Controllers\Api\V2\Composer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Composer\Package;

class Packages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Package::paginate(self::PAGE_COUNT));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(Package::factory()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Composer\Package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Package $package): JsonResponse
    {
        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Composer\Package $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package): JsonResponse
    {
        $package->update($request->toArray());
        return response()->json($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Composer\Package $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Package $package): JsonResponse
    {
        $package->delete();
        return response()->json($package);
    }
}
