<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\AddressPhone;
use App\Rules\PhoneNumber;
use App\Rules\Address;
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
            'locations.*.phone' => [new PhoneNumber],
            'locations.*.address' => [new Address],
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
        return $this->hasMany(Order::class);
    }

    /**
     * Restaurant addresses numbers
     * 
     * @return HasMany
     */
    public function locations(): HasMany
    {
        return $this->hasMany(AddressPhone::class);
    }

}
