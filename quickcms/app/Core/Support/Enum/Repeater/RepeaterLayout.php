<?php

declare(strict_types=1);

namespace App\Core\Support\Enum\Repeater;

enum RepeaterLayout: string
{
    case List = 'list';

    case Grid = 'grid';

    case Table = 'table';
}
