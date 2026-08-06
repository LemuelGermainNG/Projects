<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\RichEditor;

use App\Core\Schema\Form\Base\EditorInputBaseSchema;
use App\Core\Support\Concerns\RichEditor\HasAttachments;
use App\Core\Support\Concerns\RichEditor\HasBubbleMenu;
use App\Core\Support\Concerns\RichEditor\HasCollaboration;
use App\Core\Support\Concerns\RichEditor\HasComments;
use App\Core\Support\Concerns\RichEditor\HasEmbeds;
use App\Core\Support\Concerns\RichEditor\HasFloatingMenu;
use App\Core\Support\Concerns\RichEditor\HasSlashCommands;
use App\Core\Support\Concerns\RichEditor\HasTables;

final class RichEditorSchema extends EditorInputBaseSchema
{
    use HasAttachments;
    use HasBubbleMenu;
    use HasCollaboration;
    use HasComments;
    use HasEmbeds;
    use HasFloatingMenu;
    use HasSlashCommands;
    use HasTables;
}
