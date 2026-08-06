<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\Blocks\BlocksSchema;

final class BlocksBuilderFactory
{
    public static function make(): BlocksSchema
    {
        return BlocksSchema::make()
            ->name('content')
            ->blocks([
                BlockBuilderFactory::make(),
            ]);
    }
}
