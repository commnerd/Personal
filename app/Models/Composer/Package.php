<?php

namespace App\Models\Composer;

use App\Models\Model;

class Package extends Model
{
    /**
     * The table that maintains the data.
     *
     * @var string
     */
    protected $table = 'composer_packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'version',
        'type',
    ];

    protected $casts = [
        'version' => 'string',
    ];

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'version' => 'required|string',
            'type' => 'required|string',
        ];
    }
}
