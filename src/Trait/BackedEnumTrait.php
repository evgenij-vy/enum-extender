<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Trait;

use UnitEnum;

/**
 * @template T as UnitEnum
 * @phpstan-require-implements T
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
        return self::tryFrom($value) !== null;
    }
}
