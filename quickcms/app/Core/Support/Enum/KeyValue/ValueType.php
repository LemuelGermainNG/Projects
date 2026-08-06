<?php

declare(strict_types=1);

namespace App\Core\Support\Enum\KeyValue;

enum ValueType: string
{
    case Text = 'text';

    case Number = 'number';

    case Boolean = 'boolean';

    case Json = 'json';

    case Markdown = 'markdown';

    case Color = 'color';
}
