<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
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
            'recipe' => 'required|string',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'recipe'
    ];
}
