<?php

declare(strict_types=1);

namespace App\Core\Schema\Page;

use App\Core\Builder\Builder;

final class PageBuilder extends Builder
{
    public static function schema(): string
    {
        return PageSchema::class;
    }

    public function build(): array
    {
        /** @var PageSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'header' => $schema->header()
                ? $this->registry->build(
                    $schema->header(),
                    $this->context,
                )
                : null,

            'content' => $schema->content()
                ? $this->registry->build(
                    $schema->content(),
                    $this->context,
                )
                : null,

            'props' => $schema->props(),
        ];
    }
}
