<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Section;

use App\Core\Builder\Layout\SingleChildLayoutBuilder;

final class SectionBuilder extends SingleChildLayoutBuilder
{
    protected const TYPE = 'section';

    public static function schema(): string
    {
        return SectionSchema::class;
    }
}
