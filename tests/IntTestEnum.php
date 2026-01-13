<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Tests;

use EvgenijVY\EnumExtender\Trait\BackedEnumTrait;

enum IntTestEnum: int
{
    use BackedEnumTrait;

    case ZERO = 0;
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
    case FOUR = 4;
    case FIVE = 5;
    case TEN = 10;
}
