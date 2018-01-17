<?php

namespace App\Food;

use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * Orders that belong to this restaurant
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(\App\Food\Order::class);
    }

    /**
     * Active order belonging to this restaurant
     *
     * @return Order
     */
    public function getActiveOrderAttribute(): Order
    {
        return Order::where('active', true)->where('restaurant_id', $this->id)->firstOrFail();
    }
}
