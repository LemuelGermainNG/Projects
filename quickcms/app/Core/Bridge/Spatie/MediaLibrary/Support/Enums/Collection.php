<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\MediaLibrary\Support\Enums;

enum Collection: string
{
    case Default = 'default';

    case Images = 'images';

    case Documents = 'documents';

    case Avatars = 'avatars';

    case Attachments = 'attachments';
}
