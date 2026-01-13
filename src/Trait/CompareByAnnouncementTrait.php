<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Trait;

use EvgenijVY\EnumExtender\Service\CompareByAnnouncementService;
use UnitEnum;

/**
 * @template T as static
 * @extends UnitEnum<T>
 */
trait CompareByAnnouncementTrait
{
    /**
     * @param T $enum
     * @return T[]
     */
    public static function getGreaterThanOrEqual(self $enum): array
    {
        return CompareByAnnouncementService::getGreaterThanOrEqual($enum);
    }

    /**
     * @param T $enum
     * @return T[]
     */
    public static function getGreaterThan(self $enum): array
    {
        return CompareByAnnouncementService::getGreaterThan($enum);
    }

    /**
     * @param T $enum
     * @return T[]
     */
    public static function getLessThanOrEqual(self $enum): array
    {
        return CompareByAnnouncementService::getLessThanOrEqual($enum);
    }

    /**
     * @param T $enum
     * @return T[]
     */
    public static function getLessThan(self $enum): array
    {
        return CompareByAnnouncementService::getLessThan($enum);
    }

    /**
     * @param T $enum1
     * @param T $enum2
     * @return int - 1 if enum1 announce earlier, 0 - some case, -1 otherwise
     */
    public static function compare(self $enum1, self $enum2): int
    {
        return CompareByAnnouncementService::compare($enum1, $enum2);
    }

    /**
     * @param T $enum
     * @return int - 1 if announce earlier, 0 - some case, -1 otherwise
     */
    public function compareWith(self $enum): int
    {
        /** @var T $this */
        return CompareByAnnouncementService::compare($this, $enum);
    }

    /**
     * @param T $enum1
     * @param T $enum2
     * @return T[]
     */
    public static function getBetween(self $enum1, self $enum2): array
    {
        return CompareByAnnouncementService::getBetween($enum1, $enum2);
    }

    /**
     * @param T $enum1
     * @param T $enum2
     */
    public function isBetween(self $enum1, self $enum2): bool
    {
        /** @var T $this */
        return CompareByAnnouncementService::isBetween($this, $enum1, $enum2);
    }
}
