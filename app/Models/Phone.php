<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Rules\PhoneNumber;

class Phone extends Model
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
            'number' => ['required', new PhoneNumber],
        ];
    }
}
