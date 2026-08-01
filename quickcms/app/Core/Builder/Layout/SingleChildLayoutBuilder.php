<?php

declare(strict_types=1);

namespace App\Core\Builder\Layout;

use App\Core\Builder\Builder;
use App\Core\Schema\Layout\SingleChildLayoutSchema;

abstract class SingleChildLayoutBuilder extends Builder
{
    protected const TYPE = '';

    public function build(): array
    {
        /** @var SingleChildLayoutSchema $schema */
        $schema = $this->schema;

        return [
            'type' => static::TYPE,

            'header' => $schema->header() !== null
                ? $this->registry->build(
                    $schema->header(),
                    $this->context,
                )
                : null,

            'child' => $schema->child() !== null
                ? $this->registry->build(
                    $schema->child(),
                    $this->context,
                )
                : null,

            'props' => $schema->props(),
        ];
    }
}
