<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Link;

use App\Core\Builder\Builder;

final class LinkBuilder extends Builder
{
    public static function schema(): string
    {
        return LinkSchema::class;
    }

    public function build(): array
    {
        /** @var LinkSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'link',

            'label' => $this->evaluate($schema->label()),

            'url' => $this->evaluate($schema->url()),

            'icon' => $this->evaluate($schema->icon()),

            'color' => $this->evaluate($schema->color()),

            'props' => $schema->props(),
        ];
    }
}
