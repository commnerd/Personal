<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Model;

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
        return $this->hasMany(\App\Models\Food\Order::class);
    }
}
