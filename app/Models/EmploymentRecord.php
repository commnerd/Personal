<?php

namespace App\Models;


class EmploymentRecord extends Model
{
    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'employer' => 'required|string',
            'position' => 'required|string',
            'location' => 'required|string',
            'bullets' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'date',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employer',
        'position',
        'location',
        'bullets',
        'start_date',
        'end_date',
    ];
}
