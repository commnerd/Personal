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

    /**
     * Transform phone presentation
     *
     * @return string Correctly formatted phone number or email
     */
    public function getEmailPhoneAttribute(): string
    {
        if(isset($this->attributes['email_phone']) && preg_match('/^(\d)+$/', $this->attributes['email_phone'])) {
            return $this->formatPhone($this->attributes['email_phone']);
        }

        return $this->attributes['email_phone'] ?? '';
    }

    /**
     * Transform phone into only numbers
     *
     * @return null
     */
    public function setEmailPhoneAttribute(string $input)
    {
        $original = $input;
        if($input = preg_replace('/[^0-9]/', "", $input)) {
            if(strlen($input) === 10 || strlen($input) === 11) {
                $this->attributes['email_phone'] = $input;
                return;
            }
        }
        $this->attributes['email_phone'] = $original;
    }

    /**
     * Format phone number from string
     * @param  [type] $string [description]
     * @return string         [description]
     */
    private function formatPhone($string): string
    {
        if(strlen($string) === 11) {
            return implode('-', [
                substr($string, 0, 1),
                substr($string, 1, 3),
                substr($string, 4, 3),
                substr($string, 7, 4),
            ]);
        }
        return implode('-', [
            substr($string, 0, 3),
            substr($string, 3, 3),
            substr($string, 6, 4),
        ]);
    }
}
