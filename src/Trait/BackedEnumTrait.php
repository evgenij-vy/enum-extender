<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Trait;

use BackedEnum;

/**
 * @method static BackedEnum[] cases()
 * @method static BackedEnum|null tryFrom(mixed $value)
 */
trait BackedEnumTrait
{
    /**
     * @param static[]|null $enums
     * @return string[]|int[]
     */
    public static function getValues(?array $enums = null): array
    {
        return array_column($enums ?? self::cases(), 'value');
    }

    public static function hasValue(int|string $value): bool
    {
        return (bool) self::tryFrom($value);
    }
}