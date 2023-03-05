<?php

namespace App\Services;

use App\Models\ComposerPackageSource;
use App\Models\ComposerPackage;

class ComposerService
{
    public static function buildJsonStructure(): array
    {
        $packages = ComposerPackage::with('source')->get();
        $struct = [
            "packages" => [],
        ];
        foreach($packages as $package) {
            if (!isset($struct['packages'][$package->name])) {
                $struct['packages'][$package->name] = [];
            }
            $struct['packages'][$package->name][$package->version] = [
                "name" => $package->name,
                "version" => $package->version,
                "type" => $package->type,
                "source" => [
                    "reference" => $package->source->reference,
                    "type" => $package->source->type,
                    "url" => $package->source->url,
                ],
            ];
        }
        return $struct;
    }
}