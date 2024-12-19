<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Trait;

/**
 * @method static[] cases()
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
}