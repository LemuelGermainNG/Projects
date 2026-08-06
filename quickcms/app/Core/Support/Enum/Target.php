<?php

declare(strict_types=1);

namespace App\Core\Support\Enum;

enum Target: string
{
    case Self = '_self';

    case Blank = '_blank';

    case Parent = '_parent';

    case Top = '_top';
}
