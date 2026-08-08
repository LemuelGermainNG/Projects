<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule;

use App\Core\Builder\Builder;
use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;

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

        $parameters = $schema->parameters();

        $compiledParameters = $this->compileChild(
            $parameters,
        );

        if (
            $parameters instanceof PasswordParameters
            && ! $parameters->shouldIncludeDefaults()
            && $compiledParameters !== null
        ) {
            $compiledParameters = array_filter(
                $compiledParameters,
                fn (mixed $value, string $key): bool => $value !== false
                    && $value !== null
                    && ! ($key === 'showStrengthMeter' && $value === true),
                ARRAY_FILTER_USE_BOTH,
            );
        }

        $this->addIfNotNull(
            $data,
            'parameters',
            $compiledParameters,
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
