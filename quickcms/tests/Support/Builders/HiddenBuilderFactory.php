<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\Hidden\HiddenSchema;

final class HiddenBuilderFactory
{
    public static function make(): HiddenSchema
    {
        return HiddenSchema::make()
            ->value(15);
    }
}
