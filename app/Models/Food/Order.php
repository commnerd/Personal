<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Model;

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
     * @return BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Food\Restaurant::class);
    }
}
