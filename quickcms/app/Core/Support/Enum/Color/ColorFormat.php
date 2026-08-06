<?php

declare(strict_types=1);

namespace App\Core\Support\Enum\Color;

enum ColorFormat: string
{
    case Hex = 'hex';

    case Rgb = 'rgb';

    case Hsl = 'hsl';

    case Hsv = 'hsv';
}
