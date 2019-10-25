<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\System;

class SystemStats extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return System::class; }

}
