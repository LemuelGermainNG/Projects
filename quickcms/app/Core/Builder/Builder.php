<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;
use App\Core\Source\Contracts\Source;
use App\Core\Support\Concerns\EvaluatesValues;
use App\Core\Support\Contracts\EvaluationContextInterface;
use BackedEnum;
use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class Builder implements BuilderInterface
{
    use EvaluatesValues;

    public function __construct(
        protected readonly Schema $schema,
        protected readonly BuilderRegistry $registry,
        protected readonly EvaluationContextInterface $context,
    ) {
    }

    protected function compileChild(?Schema $schema): ?array
    {
        if ($schema === null) {
            return null;
        }

        return $schema->compile(
            $this->registry,
        );
    }

    /**
     * @param array<int, Schema> $schemas
     *
     * @return array<int, array>
     */
    protected function compileSchema(array $schemas): array
    {
        return Collection::make($schemas)
            ->map(fn (Schema $schema): array => $schema->compile(
                $this->registry,
            ))
            ->all();
    }

    /**
     * @param array<int|string, mixed>|null $items
     *
     * @return array<int|string, mixed>|null
     */
    protected function compileCollection(?array $items): ?array
    {
        if ($items === null) {
            return null;
        }

        foreach ($items as $key => $item) {
            if ($item instanceof Schema) {
                $items[$key] = $item->compile(
                    $this->registry,
                    $this->context,
                );
            }
        }

        return $items;
    }

    protected function addIfNotNull(array &$data, string $key, mixed $value): void
    {
        if ($value !== null) {
            $data[$key] = $value;
        }
    }
    protected function evaluateEnum(mixed $value): mixed
    {
        $value = $this->evaluate($value);

        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        return $value;
    }

    protected function evaluateEnums(
        array|Closure|null $values,
    ): ?array {
        $values = $this->evaluate($values);

        if ($values === null) {
            return null;
        }

        return array_map(
            fn (mixed $value): mixed => $value instanceof \BackedEnum
                ? $value->value
                : $value,
            $values,
        );
    }
    protected function type(): string
    {
        $class = class_basename($this->schema);

        $class = Str::of($class)
            ->replaceLast('Schema', '')
            ->kebab()
            ->toString();

        return $class;
    }

    protected function resolveSource(
        string|Source|null $source,
    ): ?Source
    {
        if ($source === null) {
            return null;
        }

        return $this->sourceRegistry->resolve(
            $this->evaluate($source),
        );
}
}
