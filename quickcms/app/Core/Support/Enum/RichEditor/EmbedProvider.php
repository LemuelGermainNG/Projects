<?php

declare(strict_types=1);

namespace App\Core\Support\Enum\RichEditor;

enum EmbedProvider: string
{
    case YouTube = 'youtube';

    case Vimeo = 'vimeo';

    case Loom = 'loom';

    case Figma = 'figma';

    case GitHub = 'github';

    case Instagram = 'instagram';

    case X = 'x';
}
