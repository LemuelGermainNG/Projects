<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Split;

use App\Core\Builder\Builder;

final class SplitBuilder extends Builder
{
    public static function schema(): string
    {
        return SplitSchema::class;
    }

    public function build(): array
    {
        /** @var SplitSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'direction' => $this->evaluate(
                $schema->direction(),
            ),

            'ratio' => $schema->ratio(),

            'start' => $schema->start() !== null
                ? $this->registry->build(
                    $schema->start(),
                    $this->context,
                )
                : null,

            'end' => $schema->end() !== null
                ? $this->registry->build(
                    $schema->end(),
                    $this->context,
                )
                : null,

            'props' => $schema->props(),
        ];
    }
}
