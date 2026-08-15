<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Password;

use App\Core\Schema\Form\Base\TextInputBaseBuilder;

final class PasswordInputBuilder extends TextInputBaseBuilder
{
    public static function schema(): string
    {
        return PasswordInputSchema::class;
    }

    public function build(): array
    {
        /** @var PasswordInputSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        $this->addIfNotNull(
            $data,
            'revealable',
            $this->evaluate(
                $schema->isRevealable(),
            ),
        );

        return $data;
    }
}
