<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Tests;

use EvgenijVY\EnumExtender\Service\BackedEnumService;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

final class BackedEnumServiceTest extends TestCase
{
    #[TestWith([IntTestEnum::class, [0, 1, 2, 3, 4, 5, 10]])]
    #[TestWith([StringTestEnum::class, ['first', 'second', 'third', 'fourth', 'other', 'last']])]
    public function testGetValues(string $enumClass, array $values): void
    {
        $this->assertEquals(BackedEnumService::getValues($enumClass), $values);
    }

    #[TestWith([[IntTestEnum::FOUR, IntTestEnum::FIVE], [4,5]])]
    #[TestWith([[StringTestEnum::SECOND, StringTestEnum::THIRD], ['second', 'third']])]
    public function testConvertToValues(array $enums, array $values): void
    {
        $this->assertEquals(BackedEnumService::convertToValues($enums), $values);
    }

    #[TestWith([IntTestEnum::class, 4, true])]
    #[TestWith([IntTestEnum::class, 45, false])]
    #[TestWith([IntTestEnum::class, 0, true])]
    #[TestWith([StringTestEnum::class, 'second', true])]
    #[TestWith([StringTestEnum::class, 'none', false])]
    public function testHasValue(string $enumClass, int|string $value, bool $result): void
    {
        $this->assertEquals(BackedEnumService::hasValue($enumClass, $value), $result);
    }
}
