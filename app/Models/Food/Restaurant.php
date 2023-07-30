<?php

namespace App\Models\Food;

use App\Models\Model;

class Restaurant extends Model
{
    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'version' => 'required|float',
            'type' => 'required|string',
        ];
    }
}
