<?php

declare(strict_types=1);

namespace App\Core\Support\Enums\Layout;

enum Direction: string
{
    case Horizontal = 'horizontal';

    case Vertical = 'vertical';

    case Row = 'row';

    case Column = 'column';
}
