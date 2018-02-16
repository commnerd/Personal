<?php

namespace App\Work;

use App\Model;

class PortfolioEntry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'details',
    ];

    /**
     * Get validation rules for model
     * 
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [];
    }
}
