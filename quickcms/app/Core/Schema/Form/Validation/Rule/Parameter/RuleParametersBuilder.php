<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

use App\Core\Builder\Builder;
use BackedEnum;
use Closure;

final class RuleParametersBuilder extends Builder
{
    public static function schema(): string
    {
        return RuleParameters::class;
    }

    public function build(): array
    {
        /** @var RuleParameters $schema */
        $schema = $this->schema;

        $data = [];

        foreach ($schema->properties() as $key => $value) {
            if ($key === 'includeDefaults') {
                continue;
            }

            $data[$key] = $this->compileValue($value);
        }

        return array_filter(
            $data,
            fn (mixed $value): bool => $value !== null,
        );
    }

    private function compileValue(mixed $value): mixed
    {
        if ($value instanceof Closure) {
            $value = $this->evaluate($value);
        }

        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        if (is_array($value)) {
            return array_map(
                fn (mixed $item): mixed => $this->compileValue($item),
                $value,
            );
        }

        return $value;
    }
}
