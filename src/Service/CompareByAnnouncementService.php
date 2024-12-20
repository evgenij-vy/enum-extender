<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Service;

use UnexpectedValueException;
use UnitEnum;

class CompareByAnnouncementService
{
    /**
     * @template T
     * @psalm-param T $enum
     * @return T[]
     */
    public static function getGreaterThanOrEqual(UnitEnum $enum): array
    {
        $arrayEnum = $enum::cases();

        return array_slice($arrayEnum, array_search($enum, $arrayEnum, true));
    }

    /**
     * @template T
     * @psalm-param T $enum
     * @return T[]
     */
    public static function getGreaterThan(UnitEnum $enum): array
    {
        $arrayEnum = $enum::cases();

        return array_slice($arrayEnum, array_search($enum, $arrayEnum, true) + 1);
    }

    /**
     * @template T
     * @psalm-param T $enum
     * @return T[]
     */
    public static function getLessThanOrEqual(UnitEnum $enum): array
    {
        $arrayEnum = $enum::cases();

        return array_slice($arrayEnum, 0, array_search($enum, $arrayEnum, true) + 1);
    }

    /**
     * @template T
     * @psalm-param T $enum
     * @return T[]
     */
    public static function getLessThan(UnitEnum $enum): array
    {
        $arrayEnum = $enum::cases();

        return array_slice($arrayEnum, 0, array_search($enum, $arrayEnum, true));
    }

    /**
     * @template T
     * @psalm-param T $enum1
     * @psalm-param T $enum2
     * @return int - 1 if enum1 announce earlier, 0 - some case, -1 otherwise
     */
    public static function compare(UnitEnum $enum1, UnitEnum $enum2): int
    {
        if ($enum1::class !== $enum2::class) {
            throw new UnexpectedValueException('Arguments must be a same class');
        }

        if ($enum1 === $enum2) {
            return 0;
        }

        $arrayEnum = $enum1::cases();

        return array_search($enum1, $arrayEnum, true) < array_search($enum2, $arrayEnum, true) ? -1 : 1;
    }
}