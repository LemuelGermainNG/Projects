<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State;

use App\Core\Builder\Builder;

final class StateBuilder extends Builder
{
    public static function schema(): string
    {
        return StateSchema::class;
    }

    public function build(): array
    {
        /** @var StateSchema $schema */
        $schema = $this->schema;

        $data = [];

        $path = $this->evaluate(
            $schema->statePath(),
        );

        if ($path !== null) {
            $data['path'] = $path;
        }

        $default = $this->evaluate(
            $schema->defaultValue(),
        );

        if ($default !== null) {
            $data['default'] = $default;
        }

        $live = $this->evaluate(
            $schema->isLive(),
        );

        if ($live) {
            $data['live'] = true;
        }

        $reactive = $this->evaluate(
            $schema->isReactive(),
        );

        if ($reactive) {
            $data['reactive'] = true;
        }

        $persist = $this->evaluate(
            $schema->shouldPersist(),
        );

        if ($persist) {
            $data['persist'] = true;
        }

        $dehydrated = $this->evaluate(
            $schema->shouldDehydrate(),
        );

        if (! $dehydrated) {
            $data['dehydrated'] = false;
        }

        if ($schema->hydrateCallback() !== null) {
            $data['hydrate'] = true;
        }

        if ($schema->afterHydrateCallback() !== null) {
            $data['afterHydrate'] = true;
        }

        if ($schema->afterUpdateCallback() !== null) {
            $data['afterUpdate'] = true;
        }

        if ($schema->beforeDehydrateCallback() !== null) {
            $data['beforeDehydrate'] = true;
        }

        if ($schema->dehydrateCallback() !== null) {
            $data['dehydrate'] = true;
        }

        return $data;
    }
}
