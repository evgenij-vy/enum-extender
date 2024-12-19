<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Trait;

use EvgenijVY\EnumExtender\Service\CompareByAnnouncementService;
use UnitEnum;

/**
 * @template T as static
 */
trait CompareByAnnouncementTrait
{
    /**
     * @psalm-param UnitEnum $enum
     * @return T[]
     */
    public static function greaterThanOrEqual(self $enum): array
    {
        return CompareByAnnouncementService::greaterThanOrEqual($enum);
    }

    /**
     * @psalm-param UnitEnum $enum
     * @return T[]
     */
    public static function greaterThan(self $enum): array
    {
        return CompareByAnnouncementService::greaterThan($enum);
    }

    /**
     * @psalm-param UnitEnum $enum
     * @return T[]
     */
    public static function lessThanOrEqual(self $enum): array
    {
        return CompareByAnnouncementService::lessThanOrEqual($enum);
    }

    /**
     * @psalm-param UnitEnum $enum
     * @return T[]
     */
    public static function lessThan(self $enum): array
    {
        return CompareByAnnouncementService::lessThan($enum);
    }

    /**
     * @psalm-param UnitEnum $enum1
     * @psalm-param UnitEnum $enum2
     * @return int - 1 if enum1 announce earlier, 0 - some case, -1 otherwise
     */
    public static function compare(self $enum1, self $enum2): int
    {
       return CompareByAnnouncementService::compare($enum1, $enum2);
    }

    /**
     * @return int - 1 if announce earlier, 0 - some case, -1 otherwise
     */
    public function compareWith(self $enum): int
    {
        return self::compare($this, $enum);
    }
}