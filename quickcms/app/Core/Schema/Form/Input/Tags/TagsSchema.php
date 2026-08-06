<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Tags;

use App\Core\Bridge\Spatie\Tags\Traits\InteractsWithSpatieTags;
use App\Core\Schema\Form\Base\SelectInputBaseSchema;
use App\Core\Support\Concerns\Tags\HasCreateOnBlur;
use App\Core\Support\Concerns\Tags\HasLocale;
use App\Core\Support\Concerns\Tags\HasMaxTags;
use App\Core\Support\Concerns\Tags\HasSeparator;
use App\Core\Support\Concerns\Tags\HasSuggestions;
use App\Core\Support\Concerns\Tags\HasTagType;

final class TagsSchema extends SelectInputBaseSchema
{
    use HasTagType;
    use HasLocale;
    use HasSeparator;
    use HasMaxTags;
    use HasSuggestions;
    use HasCreateOnBlur;
    use InteractsWithSpatieTags;
}
