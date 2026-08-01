<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Card;

use App\Core\Builder\Layout\SingleChildLayoutBuilder;

final class CardBuilder extends SingleChildLayoutBuilder
{
    protected const TYPE = 'card';

    public static function schema(): string
    {
        return CardSchema::class;
    }
}
