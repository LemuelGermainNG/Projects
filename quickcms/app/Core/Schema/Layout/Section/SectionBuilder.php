<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Section;

use App\Core\Builder\Builder;

final class SectionBuilder extends Builder
{
    public const TYPE = 'section';

    public static function schema(): string
    {
        return SectionSchema::class;
    }

    public function build(): array
    {
        /** @var SectionSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

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
