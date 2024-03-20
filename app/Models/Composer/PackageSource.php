<?php

namespace App\Models\Composer;

use App\Models\Model;

class PackageSource extends Model
{
    const TYPE_GIT = "git";
    const TYPE_SVN = "svn";


    const TYPES = [
        self::TYPE_GIT => "Git",
        self::TYPE_SVN => "Subversion",
    ];

    /**
     * The table that maintains the data.
     *
     * @var string
     */
    protected $table = 'composer_package_sources';

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'reference' => 'required',
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
        'composer_package_id', 'reference', 'type', 'url'
    ];
}
