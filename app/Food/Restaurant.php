<?php

namespace App\Food;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * Mass-assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
