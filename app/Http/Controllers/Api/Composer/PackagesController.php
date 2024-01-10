<?php

namespace App\Http\Controllers\Api\Composer;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Support\Facades\DB;
use App\Models\Composer\{Package, PackageSource};

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Package::with('sources')->paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(Package::getValidationRules());

        DB::beginTransaction();
        $package = Package::create($request->all());
        $package->sources()->createMany($request->sources);
        DB::commit();

        $package->load('sources');

        return response()->json($package);
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package): JsonResponse
    {
        $package->load('sources');

        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package): JsonResponse
    {
        $request->validate(Package::getValidationRules());

        DB::beginTransaction();
        $package->update($request->all());
        $keepers = collect($request->sources)->each(function($source) use ($package) {
            if(isset($source['id'])) {
                PackageSource::find($source['id'])->update($source);
            } else {
                $source['composer_package_id'] = $package->id;
                PackageSource::make($source)->save();
            }
        })->pluck('id');
        PackageSource::whereNotIn('id', $keepers)->delete();
        DB::commit();

        $package->load('sources');

        return response()->json($package);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
    }
}
