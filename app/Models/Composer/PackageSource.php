<?php

namespace App\Models\Composer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSource extends Model
{
    use HasFactory;

    protected $table = 'composer_package_sources';
}
