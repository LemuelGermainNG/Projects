<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State;

use App\Core\Builder\Builder;

final class StateBuilder extends Builder
{
    public static function schema(): string
    {
        return State::class;
    }

    public function build(): array
    {
        /** @var State $schema */
        $schema = $this->schema;

        $data = [];

        $this->addIfNotNull(
            $data,
            'path',
            $this->evaluate(
                $schema->statePath(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'default',
            $this->evaluate(
                $schema->defaultValue(),
            ),
        );

        if ($schema->hydrateCallback() !== null) {
            $data['hydrate'] = true;
        }

        if ($schema->dehydrateCallback() !== null) {
            $data['dehydrate'] = true;
        }

        return $data;
    }
}
