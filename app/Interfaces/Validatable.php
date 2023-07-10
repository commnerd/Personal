<?php

namespace App\Interfaces;

interface Validatable {
    public static function getValidationRules(): array;
}
