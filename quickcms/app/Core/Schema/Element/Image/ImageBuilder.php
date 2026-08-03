<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Image;

use App\Core\Builder\Builder;

final class ImageBuilder extends Builder
{
    public static function schema(): string
    {
        return ImageSchema::class;
    }

    public function build(): array
    {
        /** @var ImageSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'image',

            'url' => $this->evaluate($schema->url()),

            'alt' => $this->evaluate($schema->alt()),

            'width' => $schema->width(),

            'height' => $schema->height(),

            'props' => $schema->props(),
        ];
    }
}
