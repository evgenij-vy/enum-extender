<?php

declare(strict_types=1);

namespace EvgenijVY\EnumExtender\Tests;

use EvgenijVY\EnumExtender\Trait\BackedEnumTrait;
use EvgenijVY\EnumExtender\Trait\CompareByAnnouncementTrait;

enum StringTestEnum: string
{
    use BackedEnumTrait;
    use CompareByAnnouncementTrait;

    case FIRST = 'first';
    case SECOND = 'second';
    case THIRD = 'third';
    case FOURTH = 'fourth';
    case OTHER = 'other';
    case LAST = 'last';
}
