<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;
use Illuminate\Support\Collection;
use App\Core\Support\Concerns\EvaluatesValues;
use App\Core\Support\Contracts\EvaluationContextInterface;

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

    protected function addIfNotNull(array &$data, string $key, mixed $value): void
    {
        if ($value !== null) {
            $data[$key] = $value;
        }
    }
}
