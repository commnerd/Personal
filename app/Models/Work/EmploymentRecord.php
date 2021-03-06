<?php

namespace App\Models\Work;

use App\Models\Model;

class EmploymentRecord extends Model
{
    private static $months = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec',
    ];

    /**
     * Eager loaded variables.
     *
     * @var array
     */
    protected $append = [
        'sortDate',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employer',
        'position',
        'location',
        'start_date',
        'end_date',
        'bullets',
    ];

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
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'bullets' => 'required|string',
        ];
    }

    /**
     * Get sorting date attribute
     * @return string Date
     */
    public function getSortDateAttribute(): string
    {
        if(preg_match('/(\w{3})\s(\d{4})/', $this->start_date, $matches)) {
            $month = sprintf("%02d", array_search($matches[1], EmploymentRecord::$months) + 1);
            return $matches[2]."-".$month;
        }
        return "";
    }
}
