<?php

declare(strict_types=1);

namespace App\Core\Schema\Confirm;

use App\Core\Builder\Builder;

final class ConfirmBuilder extends Builder
{
    public static function schema(): string
    {
        return ConfirmSchema::class;
    }

    public function build(): array
    {
        /** @var ConfirmSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'confirm',

            'title' => $schema->title(),

            'description' => $schema->description(),

            'confirmLabel' => $schema->confirmLabel(),

            'cancelLabel' => $schema->cancelLabel(),

            'icon' => $this->evaluate(
                $schema->icon(),
            ),

            'color' => $this->evaluate(
                $schema->color(),
            )?->value,

            'props' => $schema->props(),
        ];
    }
}
