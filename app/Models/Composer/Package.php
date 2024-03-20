<?php

namespace App\Models\Composer;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Package extends Model
{
    const TYPE_PROJECT = "project";
    const TYPE_LIBRARY = "library";


    const TYPES = [
        self::TYPE_PROJECT => "Project",
        self::TYPE_LIBRARY => "Library",
    ];

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
        'name', 'version', 'type'
    ];

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        $sourceRules = PackageSource::getValidationRules();

        return [
            'name' => 'required',
            'version' => 'required',
            'type' => 'required|in:'.implode(",", array_keys(self::TYPES)),
            'source_reference' => $sourceRules['reference'],
            'source_type' => $sourceRules['type'],
            'source_url' => $sourceRules['url'],
        ];
    }

    /**
     * Source definition for package
     *
     * @return HasOne
     */
    public function source(): HasOne
    {
        return $this->hasOne(PackageSource::class);
    }

}
