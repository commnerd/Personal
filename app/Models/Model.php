<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use App\Interfaces\Validatable;

abstract class Model extends IlluminateModel implements Validatable
{

}
