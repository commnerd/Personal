<?php

namespace App\Work;

use Illuminate\Database\Eloquent\Model;

class EmploymentRecord extends Model
{
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
}
