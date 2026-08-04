<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Option;

use App\Core\Builder\Builder;

final class OptionBuilder extends Builder
{
    public static function schema(): string
    {
        return OptionSchema::class;
    }

    public function build(): array
    {
        /** @var OptionSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => $this->type(),

            'value' => $this->evaluate(
                $schema->value(),
            ),

            'label' => $this->evaluate(
                $schema->label(),
            ),

            'disabled' => $this->evaluate(
                $schema->disabled(),
            ),
            'description' => $this->evaluate(
                $schema->description(),
            ),
            'props' => $schema->props(),
        ];

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'icon',
            $this->evaluate(
                $schema->icon(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'image',
            $this->compileChild(
                $schema->image(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'badge',
            $this->compileChild(
                $schema->badge(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'group',
            $this->evaluate(
                $schema->group(),
            ),
        );

        if ($schema->metadata() !== []) {
            $data['metadata'] = $schema->metadata();
        }

        $data['props'] = $schema->props();

        return $data;
    }
}
