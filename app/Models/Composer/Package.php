<?php

namespace App\Models\Composer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Package extends Model
{
    use HasFactory;
    
    const TYPE_PROJECT = "project";
    const TYPE_LIBRARY = "library";

    const TYPES = [
        self::TYPE_PROJECT => "Project",
        self::TYPE_LIBRARY => "Library",
    ];

    protected $table = 'composer_packages';

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        $sourceRules = ComposerPackageSource::getValidationRules();

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'version', 'type'
    ];

    /**
     * The relationships that load by default.
     *
     * @var array
     */
    // protected $with = [
    //     'source'
    // ];

    /**
     * Source definition for package
     *
     * @return HasOne
     */
    public function source(): HasOne
    {
        return $this->hasOne(ComposerPackageSource::class);
    }
}
