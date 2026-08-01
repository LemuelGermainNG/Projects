<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Card;

use App\Core\Builder\Builder;

final class CardBuilder extends Builder
{
    public const TYPE = 'card';

    public static function schema(): string
    {
        return CardSchema::class;
    }

    public function build(): array
    {
        /** @var CardSchema $schema */
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
