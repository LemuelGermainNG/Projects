<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule;

use App\Core\Builder\Builder;

final class RuleBuilder extends Builder
{
    public static function schema(): string
    {
        return Rule::class;
    }

    public function build(): array
    {
        /** @var Rule $schema */
        $schema = $this->schema;

        $data = [
            'type' => $schema->type()->value,
        ];

        $this->addIfNotNull(
            $data,
            'parameters',
            $this->compileChild(
                $schema->parameters(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'message',
            $this->evaluate(
                $schema->getMessage(),
            ),
        );

        return $data;
    }
}
