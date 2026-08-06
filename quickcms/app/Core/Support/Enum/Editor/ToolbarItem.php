<?php

declare(strict_types=1);

namespace App\Core\Support\Enum\Editor;

enum ToolbarItem: string
{
    case Bold = 'bold';

    case Italic = 'italic';

    case Underline = 'underline';

    case Strike = 'strike';

    case Heading = 'heading';

    case Paragraph = 'paragraph';

    case Quote = 'quote';

    case Code = 'code';

    case CodeBlock = 'code-block';

    case Link = 'link';

    case Image = 'image';

    case Video = 'video';

    case Table = 'table';

    case BulletList = 'bullet-list';

    case OrderedList = 'ordered-list';

    case TaskList = 'task-list';

    case HorizontalRule = 'horizontal-rule';

    case Undo = 'undo';

    case Redo = 'redo';

    case Fullscreen = 'fullscreen';

    case Preview = 'preview';

    case Source = 'source';

    case Emoji = 'emoji';

    case Mention = 'mention';

    case AlignLeft = 'align-left';

    case AlignCenter = 'align-center';

    case AlignRight = 'align-right';

    case AlignJustify = 'align-justify';
}
