<?php

declare(strict_types=1);

namespace App\Core\Support\Enum\Markdown;

enum MarkdownFlavor: string
{
    case CommonMark = 'commonmark';

    case GitHub = 'github';
}
