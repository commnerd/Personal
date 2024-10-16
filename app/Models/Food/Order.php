<?php

namespace App\Models\Food;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'restaurant_id' => 'required|int',
            'label' => 'required|string',
            'notes' => 'required|string',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'active',
        'label',
        'notes',
    ];
}
