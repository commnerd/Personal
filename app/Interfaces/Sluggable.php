<?php

namespace App\Interfaces;

interface Sluggable {
    public static function slug(bool $plural = false): string;
}
