<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\MediaLibrary\Support\Enums;

enum Conversion: string
{
    case Thumb = 'thumb';

    case Small = 'small';

    case Medium = 'medium';

    case Large = 'large';
}
