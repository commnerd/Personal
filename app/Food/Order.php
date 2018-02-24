<?php

namespace App\Food;

use App\Model;

class Order extends Model
{
    /**
     * Get validation rules
     *
     * @return array
     */
    public static function getValidationRules(): array
    {
        return [
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'label' => 'required|max:191',
            'notes' => 'required|string',
        ];
    }

    /**
     * Mass-assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'label',
        'notes',
    ];

    /**
     * Related restaurant
     *
     * @return HasOne
     */
    public function restaurant(): HasOne
    {
        return $this->hasOne(\App\Food\Restaurant::class);
    }
}
