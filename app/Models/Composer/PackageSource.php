<?php

namespace App\Models\Composer;

use App\Models\Model;

class PackageSource extends Model
{
    /**
     * The table that maintains the data.
     *
     * @var string
     */
    protected $table = 'composer_package_sources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'composer_package_id',
        'reference',
        'type',
        'url',
    ];

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'composer_package_id' => 'required|int',
            'reference' => 'required|string',
            'type' => 'required',
            'url' => 'required|string',
        ];
    }
}
