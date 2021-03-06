<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends Model
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
            'reference' => 'required|string|min:1|max:255',
            'reminder' => 'required|string',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'reminder',
    ];
}
