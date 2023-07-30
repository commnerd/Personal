<?php

namespace App\Models;

class ContactMessage extends Model
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
            'email_phone' => 'required|string',
            'message' => 'required|string',
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email_phone',
        'message',
    ];
}
