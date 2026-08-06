<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Markdown;

use App\Core\Schema\Form\Base\EditorInputBaseSchema;
use App\Core\Support\Concerns\Markdown\HasEmoji;
use App\Core\Support\Concerns\Markdown\HasFlavor;
use App\Core\Support\Concerns\Markdown\HasFrontMatter;
use App\Core\Support\Concerns\Markdown\HasHtml;
use App\Core\Support\Concerns\Markdown\HasMermaid;
use App\Core\Support\Concerns\Markdown\HasSyntaxHighlight;
use App\Core\Support\Concerns\Markdown\HasTableOfContents;

final class MarkdownSchema extends EditorInputBaseSchema
{
    use HasEmoji;
    use HasFlavor;
    use HasFrontMatter;
    use HasHtml;
    use HasMermaid;
    use HasSyntaxHighlight;
    use HasTableOfContents;
}
