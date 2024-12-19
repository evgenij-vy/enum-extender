<?php

declare(strict_types=1);

namespace EvgenijVY\Enum\Service;

use BackedEnum;

class BackedEnumService
{
    /**
     * @return string[]|int[]
     */
    public static function getValues(BackedEnum $enum): array
    {
        return array_column($enum::cases(), 'value');
    }

    /**
     * @param BackedEnum[] $enums
     * @return string[]|int[]
     */
    public static function convertToValues(array $enums): array
    {
        return array_column($enums, 'value');
    }
}