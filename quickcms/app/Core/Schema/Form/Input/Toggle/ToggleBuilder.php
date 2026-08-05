<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Toggle;

use App\Core\Schema\Form\Base\BooleanInputBaseBuilder;

final class ToggleBuilder extends BooleanInputBaseBuilder
{
    public static function schema(): string
    {
        return ToggleSchema::class;
    }

    public function build(): array
    {
        /** @var ToggleSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'onIcon',
            $this->evaluate($schema->onIcon()),
        );

        $this->addIfNotNull(
            $data,
            'offIcon',
            $this->evaluate($schema->offIcon()),
        );

        $this->addIfNotNull(
            $data,
            'onColor',
            $this->evaluate($schema->onColor()),
        );

        $this->addIfNotNull(
            $data,
            'offColor',
            $this->evaluate($schema->offColor()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
