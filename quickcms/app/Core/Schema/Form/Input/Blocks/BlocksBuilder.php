<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Blocks;

use App\Core\Schema\Form\Base\BaseInputBuilder;
use App\Core\Schema\Form\Input\Blocks\Block\BlockSchema;

final class BlocksBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return BlocksSchema::class;
    }

    public function build(): array
    {
        /** @var BlocksSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $blocks = [];

        foreach ($this->evaluate($schema->blocks()) ?? [] as $block) {
            if (! $block instanceof BlockSchema) {
                continue;
            }

            $blocks[] = $block->compile(
                $this->registry,
            );
        }

        $this->addIfNotNull(
            $data,
            'blocks',
            $blocks,
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
