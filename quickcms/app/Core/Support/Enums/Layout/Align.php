<?php

declare(strict_types=1);

namespace App\Core\Support\Enums\Layout;

enum Align: string
{
    case Start = 'start';

    case Center = 'center';

    case End = 'end';

    case Stretch = 'stretch';

    case Between = 'between';

    case Around = 'around';

    case Evenly = 'evenly';
}
