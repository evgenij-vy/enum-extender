<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Trait;

use EvgenijVY\EnumExtender\Service\CompareByAnnouncementService;
use UnitEnum;

/**
 * @require-implements UnitEnum
 * @phpstan-require-implements UnitEnum
 */
trait CompareByAnnouncementTrait
{
    /**
     * @return static[]
     */
    public static function getGreaterThanOrEqual(self $enum): array
    {
        return CompareByAnnouncementService::getGreaterThanOrEqual($enum);
    }

    /**
     * @return static[]
     */
    public static function getGreaterThan(self $enum): array
    {
        return CompareByAnnouncementService::getGreaterThan($enum);
    }

    /**
     * @return static[]
     */
    public static function getLessThanOrEqual(self $enum): array
    {
        return CompareByAnnouncementService::getLessThanOrEqual($enum);
    }

    /**
     * @return static[]
     */
    public static function getLessThan(self $enum): array
    {
        return CompareByAnnouncementService::getLessThan($enum);
    }

    /**
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
        return CompareByAnnouncementService::compare($this, $enum);
    }

    /**
     * @return static[]
     */
    public static function getBetween(self $enum1, self $enum2): array
    {
        return CompareByAnnouncementService::getBetween($enum1, $enum2);
    }

    public function isBetween(self $enum1, self $enum2): bool
    {
        return CompareByAnnouncementService::isBetween($this, $enum1, $enum2);
    }
}
