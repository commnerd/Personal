<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComposerRepo extends Model
{
    const TYPE_VCS = "vcs";

    const TYPES = [
        self::TYPE_VCS => "Version Control System",
    ];

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'type' => 'required|in:'.implode(",", array_keys(self::TYPES)),
            'url' => 'required|url',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'url'
    ];
}
