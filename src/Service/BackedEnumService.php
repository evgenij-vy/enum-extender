<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Service;

use BackedEnum;
use EvgenijVY\EnumExtender\Trait\CompareByAnnouncementTrait;

class BackedEnumService
{
    /**
     * @template T as BackedEnum
     * @param class-string<T> $enumClass
     * @return string[]|int[]
     */
    public static function getValues(string $enumClass): array
    {
        return self::convertToValues($enumClass::cases());
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
        return $enumClass::tryFrom($value) !== null;

    }
}
