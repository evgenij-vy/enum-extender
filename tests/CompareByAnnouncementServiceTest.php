<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Tests;

use EvgenijVY\EnumExtender\Service\CompareByAnnouncementService;
use Exception;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;
use UnitEnum;

final class CompareByAnnouncementServiceTest extends TestCase
{
    #[TestWith([StringTestEnum::FOURTH,[StringTestEnum::FOURTH, StringTestEnum::OTHER, StringTestEnum::LAST]])]
    #[TestWith([IntTestEnum::FOUR, [IntTestEnum::FOUR, IntTestEnum::FIVE, IntTestEnum::TEN]])]
    public function testGetGreaterThanOrEqual(UnitEnum $enum, array $expected): void
    {
        $this->assertEquals(CompareByAnnouncementService::getGreaterThanOrEqual($enum), $expected);
    }

    #[TestWith([StringTestEnum::FOURTH,[StringTestEnum::OTHER, StringTestEnum::LAST]])]
    #[TestWith([IntTestEnum::FOUR, [IntTestEnum::FIVE, IntTestEnum::TEN]])]
    public function testGetGreaterThan(UnitEnum $enum, array $expected): void
    {
        $this->assertEquals(CompareByAnnouncementService::getGreaterThan($enum), $expected);
    }

    #[TestWith([StringTestEnum::THIRD,[StringTestEnum::FIRST, StringTestEnum::SECOND, StringTestEnum::THIRD]])]
    #[TestWith([IntTestEnum::THREE, [IntTestEnum::ZERO, IntTestEnum::ONE, IntTestEnum::TWO, IntTestEnum::THREE]])]
    public function testGetLessThanOrEqual(UnitEnum $enum, array $expected): void
    {
        $this->assertEquals(CompareByAnnouncementService::getLessThanOrEqual($enum), $expected);
    }

    #[TestWith([StringTestEnum::THIRD,[StringTestEnum::FIRST, StringTestEnum::SECOND]])]
    #[TestWith([IntTestEnum::THREE, [IntTestEnum::ZERO, IntTestEnum::ONE, IntTestEnum::TWO]])]
    public function testGetLessThan(UnitEnum $enum, array $expected): void
    {
        $this->assertEquals(CompareByAnnouncementService::getLessThan($enum), $expected);
    }

    #[TestWith([StringTestEnum::FIRST, StringTestEnum::FIRST, 0])]
    #[TestWith([IntTestEnum::ZERO, IntTestEnum::ZERO, 0])]
    #[TestWith([StringTestEnum::FIRST, StringTestEnum::THIRD, -1])]
    #[TestWith([IntTestEnum::ZERO, IntTestEnum::TWO, -1])]
    #[TestWith([StringTestEnum::THIRD, StringTestEnum::FIRST, 1])]
    #[TestWith([IntTestEnum::TWO, IntTestEnum::ZERO, 1])]
    public function testCompare(UnitEnum $left, UnitEnum $right, int $result): void
    {
        $this->assertEquals(CompareByAnnouncementService::compare($left, $right), $result);
    }

    #[Test]
    public function testCompareException(): void
    {
        $this->expectException(UnexpectedValueException::class);
        CompareByAnnouncementService::compare(StringTestEnum::LAST, IntTestEnum::ONE);
    }

    #[TestWith([StringTestEnum::SECOND, StringTestEnum::OTHER, [StringTestEnum::THIRD,StringTestEnum::FOURTH]])]
    #[TestWith([StringTestEnum::SECOND, StringTestEnum::THIRD, []])]
    #[TestWith([StringTestEnum::SECOND, StringTestEnum::SECOND, []])]
    #[TestWith([IntTestEnum::ZERO, IntTestEnum::TWO, [IntTestEnum::ONE]])]
    public function testGetBetween(UnitEnum $from, UnitEnum $to, array $expected): void
    {
        $this->assertSame(CompareByAnnouncementService::getBetween($from, $to), $expected);
    }

    #[TestWith([StringTestEnum::THIRD, StringTestEnum::SECOND, new UnexpectedValueException("THIRD must be greater than SECOND")])]
    #[TestWith([IntTestEnum::TWO, StringTestEnum::SECOND, new UnexpectedValueException('Arguments must be a same class')])]
    public function testGetBetweenException(UnitEnum $from, UnitEnum $to, Exception $exception): void
    {
        $this->expectException($exception::class);
        $this->expectExceptionMessage($exception->getMessage());
        CompareByAnnouncementService::getBetween($from, $to);
    }

    #[TestWith([StringTestEnum::FIRST, StringTestEnum::THIRD, StringTestEnum::LAST, false])]
    #[TestWith([StringTestEnum::SECOND, StringTestEnum::FIRST, StringTestEnum::THIRD, true])]
    #[TestWith([IntTestEnum::ZERO, IntTestEnum::TWO, IntTestEnum::TEN, false])]
    #[TestWith([IntTestEnum::TWO, IntTestEnum::ONE, IntTestEnum::FOUR, true])]
    public function testIsBetween(UnitEnum $enum, UnitEnum $from, UnitEnum $to, bool $result): void
    {
        $this->assertEquals(CompareByAnnouncementService::isBetween($enum, $from, $to), $result);
    }

    #[TestWith([
        StringTestEnum::LAST,
        StringTestEnum::THIRD,
        StringTestEnum::SECOND,
        new UnexpectedValueException("THIRD must be greater than SECOND"),
    ])]
    #[TestWith([
        IntTestEnum::ONE,
        IntTestEnum::TWO,
        StringTestEnum::SECOND,
        new UnexpectedValueException('Arguments must be a same class'),
    ])]
    public function testIsBetweenException(UnitEnum $enum, UnitEnum $from, UnitEnum $to, Exception $exception): void
    {
        $this->expectException($exception::class);
        $this->expectExceptionMessage($exception->getMessage());
        CompareByAnnouncementService::isBetween($enum, $from, $to);
    }
}
