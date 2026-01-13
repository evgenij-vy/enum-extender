<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Tests;

use BackedEnum;
use EvgenijVY\EnumExtender\Trait\BackedEnumTrait;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

final class BackedEnumTraitTest extends TestCase
{
    #[TestWith([null, ['first', 'second', 'third', 'fourth', 'other', 'last']])]
    #[TestWith([[StringTestEnum::FIRST, StringTestEnum::SECOND], ['first', 'second']])]
    public function testGetValues(?array $enums, array $result): void
    {
        $this->assertEquals($result, StringTestEnum::getValues($enums));
    }

    /**
     * @template T as StringTestEnum|IntTestEnum
     * @phpstan-param class-string<T> $enumClass
     */
    #[TestWith([StringTestEnum::class,'first', true])]
    #[TestWith([StringTestEnum::class,'none', false])]
    #[TestWith([IntTestEnum::class, 4, true])]
    #[TestWith([IntTestEnum::class, -1, false])]
    #[TestWith([IntTestEnum::class, 0, true])]
    public function testHasValue(string $enumClass, string|int $value, bool $result): void
    {
        $this->assertEquals($enumClass::hasValue($value), $result);
    }
}
