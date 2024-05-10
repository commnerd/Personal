<?php

namespace App\Models\Work;

use App\Models\Model;

class PortfolioEntry extends Model
{
    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'url' => 'required|string',
            'details' => 'required|string',
        ];
    }

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
}
