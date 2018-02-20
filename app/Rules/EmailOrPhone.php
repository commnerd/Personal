<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Validator;

class EmailOrPhone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL) !== false) {
            return true;
        }

        $value = preg_replace('/[^0-9]/', '', $value);
        $length = strlen($value);

        if($length === 10) {
            return true;
        }

        if($length === 11 && substr($value, 0, 1) === "1") {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This field must contain a valid email address or phone number.';
    }
}
