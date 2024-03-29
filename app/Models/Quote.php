<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;
    
    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'source' => 'required|string|min:1|max:255',
            'quote' => 'required|string',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'quote',
        'source',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
