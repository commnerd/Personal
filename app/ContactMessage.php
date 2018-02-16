<?php

namespace App;

use App\Rules\EmailOrPhone;

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
            'email_phone' => ['required', new EmailOrPhone],
            'message' => 'required|string',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email_phone', 'message',
    ];
}
