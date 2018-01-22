<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioEntry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'details',
    ];
}
