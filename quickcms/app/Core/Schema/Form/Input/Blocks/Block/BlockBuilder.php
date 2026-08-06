<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Blocks\Block;

use App\Core\Builder\Builder;

final class BlockBuilder extends Builder
{
    public static function schema(): string
    {
        return BlockSchema::class;
    }

    public function build(): array
    {
        /** @var BlockSchema $schema */
        $schema = $this->schema;

        $data = [];

        $this->addIfNotNull(
            $data,
            'name',
            $this->evaluate(
                $schema->name(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'label',
            $this->evaluate(
                $schema->label(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'description',
            $this->evaluate(
                $schema->description(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'icon',
            $this->evaluate(
                $schema->icon(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'schema',
            $this->compileSchemas(
                $schema->schema(),
            ),
        );

        return $data;
    }
}
