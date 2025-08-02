<?php

namespace App\Helpers;

trait BaseEnum
{
    /**
     * @return array<string|int>
     */
    static function values(): array
    {
        return array_map(fn(self $case) => $case->value, self::cases());
    }
}
