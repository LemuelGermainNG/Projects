<?php

declare(strict_types=1);

namespace App\Core\Support\Enums;

enum Position: string
{
    case Top = 'top';

    case Bottom = 'bottom';

    case Left = 'left';

    case Right = 'right';

    case Center = 'center';

    case TopLeft = 'top-left';

    case TopRight = 'top-right';

    case BottomLeft = 'bottom-left';

    case BottomRight = 'bottom-right';
}
