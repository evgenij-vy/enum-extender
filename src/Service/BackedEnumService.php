<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Service;

use BackedEnum;

class BackedEnumService
{
    /**
     * @return string[]|int[]
     */
    public static function getValues(BackedEnum $enum): array
    {
        return self::convertToValues($enum::cases());
    }

    /**
     * @param BackedEnum[] $enums
     * @return string[]|int[]
     */
    public static function convertToValues(array $enums): array
    {
        return array_column($enums, 'value');
    }

    /**
     * @template T as BackedEnum
     * @param class-string<T> $enumClass
     */
    public static function hasValue(string $enumClass, int|string $value): bool
    {
        return (bool) $enumClass::tryFrom($value);

    }
}