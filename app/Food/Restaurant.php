<?php

namespace App\Food;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * Get validation rules
     *
     * @return array
     */
    public static function getValidationRules(): array
    {
        return [
            'name' => 'required|max:191',
        ];
    }

    /**
     * Mass-assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
