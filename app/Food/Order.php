<?php

namespace App\Food;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Mass-assignable attributes
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
